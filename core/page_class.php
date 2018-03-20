<?php

/**
 * Created by PhpStorm.
 * User: Tolya
 * Date: 06.03.2018
 * Time: 22:01
 */
class Page {

    const DEF_LANGUAGE = 'pl';
    const LANGUAGE_COOKIE_NAME = 'curLng';

    public $langPack = '';

    // Массив доступных для выбора языков
    private $LangArray     = array();
    private $ruLangSupport = array("ru","ua","by");
    private $lang,$uri;

    public function __construct($uri) {
        $this->uri = substr($uri, 1);
        $this->langPack = require_once ROOT_DIR.'/data/cfg/lang.php';
        $this->LangArray  = array_keys($this->langPack);

//        $this->langPack = $this->langPack[ $this->lang ];


    }

    public function setActionParams() {
        /**
         * $params[model] requested page name
         * $params[subModel] requested sub page
         * $params[lang] requested page language
         */
        $params = array();
        $params["model"] = "home";
        $params["subModel"] = $params["lang"] = "";
        $uriLang = "";

        if (! empty($this->uri)) {
            $routs = explode('/', str_replace(dirname($_SERVER['PHP_SELF'])."/",
                "",$this->uri));
//        $request = array_diff($routs, array(''));
            // URI example: media/en/Moshna/Gallery
            $params["model"]    = array_shift($routs); // first param in uri
            $uriLang            = array_shift($routs); // second
            $params["subModel"] = array_shift($routs); // third param
        }
        $this->checkLanguage( $uriLang );
        $params["lang"] = $this->lang;

//        echo '<pre>params: '; var_dump($params); echo '</pre><hr>';
        return $params;
    }

    private function checkLanguage($currentLang) {
        $needGeo = false;

         if ( ! $this->isLangSupported($currentLang) ) {
            // either unsupported lang or doesn't set
            // 1. try to read it from Cookie & Session_ID
            $cookieLang = $this->checkCookie();
            $sessinLang = $this->checkSession();

            if ( (isset($cookieLang) && isset($sessinLang)) ) {
                // we have lang in COOKIE and SESSION
                // check if it has same value
                if (strcasecmp($cookieLang,$sessinLang) > 0) { $needGeo = true; }
            // we've lost either COOKIE or SESSION
            } else { $needGeo = true; }
             $currentLang = $needGeo ? $this->getLangByGeo() : $sessinLang ;
        }

        $this->setLangParams($currentLang);
    }

    private function getLangByGeo() {
        $lang = $this::DEF_LANGUAGE;
        $utils = new Utils();
        $ip = $utils->getVisitorIP();

        $SxGeo = new SxGeo(ROOT_DIR.'/lib/SxGeo.dat');
        $countryCode = $SxGeo->getCountry($ip);

        if (isset($countryCode)) {
            $lc = strtolower($countryCode);
            if ($lc == 'pl') { $lang = "pl"; }
            elseif(in_array($lc, $this->ruLangSupport )) { $lang = "ru"; }
            else { $lang = 'en'; }
        }

        return $lang;
    }


    /**
     * @param $l
     * @return bool
     */
    private function isLangSupported($l) {
        if (!empty($l) && in_array($l, $this->LangArray)) { return true; }
        else { return false;}
    }

    /**
     * @return string
     */
    private function checkCookie() {
        $lang = '';
        if (isset($_COOKIE[$this::LANGUAGE_COOKIE_NAME])) {
            $lang = $_COOKIE[$this::LANGUAGE_COOKIE_NAME];
        }

        return $this->isLangSupported($lang) ? $lang : NULL;
    }

    /**
     * @return string
     */
    private function checkSession() {
        $lang = '';
        if (@$_SESSION[$this::LANGUAGE_COOKIE_NAME]) {
            $lang = @$_SESSION[$this::LANGUAGE_COOKIE_NAME];
        }

        return $this->isLangSupported($lang) ? $lang : NULL;
    }


    private function setLangParams($l) {
        foreach (['setCookieVal','setSessVal'] as $func) {
            $this->$func($this::LANGUAGE_COOKIE_NAME,$l);
        }
        $this->lang = $l;
    }

    private function setSessVal ($k,$v) { $_SESSION[$k] = $v; }
    private function setCookieVal($k,$v) { setcookie ($k, $v, time() + 3600*24, "/"); }

}