<?php

abstract class AbstractController {
	
//	protected $view, $cfg, $langPack, $utils;
	
	public function __construct($view) {
		$this->view = $view;

        $this->cfg      = require_once ROOT_DIR.'/data/cfg/config.php';
		$this->langPack = require_once ROOT_DIR.'/data/cfg/lang.php';

        $this->utils = new Utils();
        $ip = $this->utils->getVisitorIP();

        $SxGeo = new SxGeo(ROOT_DIR.'/lib/SxGeo.dat');
        $countryCode = $SxGeo->getCountry($ip);
        $this->lang  = ($countryCode) ? strtolower($countryCode) : $this->cfg["site"]["defLang"];

        // get all of supported languages
        $this->langIDs  = array_keys($this->langPack);
        $this->langPack = $this->langPack[ $this->lang ];
        $this->pageIDs  = explode(',',$this->langPack["pages"]);
        $this->media    = explode(',',$this->langPack["media"]);

	}
	
	abstract protected function render($str);

//	public function
	
	public function action404() {
		header("HTTP/1.1 404 Not Found");
		header("Status: 404 Not Found");
	}

}

