<?php

class Route {

    const DEF_CONTROLLER_NAME = 'Main';
    const DEF_LANGUAGE = 'pl';
    const LANGUAGE_COOKIE_NAME = 'curLng';

    // Массив доступных для выбора языков
    private $LangArray = array("ru", "pl", "en");

	public function start() {

//		if ($uri) $action_name = $uri;
//		$controller_name = $params["model"]."Controller";

        $params      = $this->setActionParams($_SERVER["REQUEST_URI"]);
		$cntrl_name  = $this::DEF_CONTROLLER_NAME.'Controller';
		$controller  = new $cntrl_name();
        $action_name = 'action'.$params['model'];
		if (method_exists($controller, $action_name)) {
		    $controller->$action_name($params);
		} else {
		    $controller->action404();
		}

	}

    private function setActionParams($uri) {
        /**
         * $params[model] requested page name
         * $params[subModel] requested sub page
         * $params[lang] requested page language
         */
        $params = array();
        $params["model"] = "home";
        $params["subModel"] = $params["lang"] =  "";

        $uri   = substr($uri, 1);
        $routs = explode('/', str_replace(dirname($_SERVER['PHP_SELF'])."/","",$uri));

//        $request = array_diff($routs, array(''));
        $params["model"]    = array_shift($routs);
//        $lng = $this->checkCookie( array_shift($routs) );
        $params["lang"]     = $this->checkLanguage( array_shift($routs) );
        $params["subModel"] = array_shift($routs);

        return $params;
	}

    private function checkLanguage($currentLang) {
	    if ( $this->isLangSupported($currentLang) ) {
            // we got the lang param from the uri
            // it's defined & supported
            // just set this new value to cookie, session and return
            $this->setLangParams($currentLang);
            return $currentLang;
        } else {
            // either unsupported lang or doesn't set
            // 1. try to read it from Cookie & Session_ID
            $cookieLang = $this->checkCookie();
            $sessinLang = $this->checkSession();

            if (
                (!isset($cookieLang) || !isset($sessinLang))
                || ($cookieLang != $sessinLang)
            ) {
                // either we don't have cookie & session
                // or it's doesn't synced
                // ---------------------
                // so, let's try to get it using GeoIP
                var_dump("either we don't have cookie & session or it's doesn't synced!".$sessinLang);
            }


            // 2. try to get it from GeoIP
            // if not - use default.
//            $this->setLangParams($this::DEF_LANGUAGE);
//            return $this::DEF_LANGUAGE;
            return $cookieLang;
        }

	}

    /**
     * @param $l
     * @return bool
     */
    private function isLangSupported($l) {
        if (isset($l) && in_array($l, $this->LangArray)) { return true; }
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

        return $this->isLangSupported($lang) ? $lang : '';
	}

    /**
     * @return string
     */
    private function checkSession() {
        $lang = '';
        if (@$_SESSION[$this::LANGUAGE_COOKIE_NAME]) {
            $lang = @$_SESSION[$this::LANGUAGE_COOKIE_NAME];
        }

        return $this->isLangSupported($lang) ? $lang : '';
	}

    /**
     * @param $l
     */
    private function setLangParams($l) {
        foreach (['setCookieVal','setSessVal'] as $func) {
            $this->$func($this::LANGUAGE_COOKIE_NAME,$l);
        }
    }

    private function setSessVal ($k,$v) { $_SESSION[$k] = $v; }
    private function setCookieVal($k,$v) { setcookie ($k, $v, time() + 3600*24, "/"); }

}
