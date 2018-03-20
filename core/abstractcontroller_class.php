<?php

abstract class AbstractController {
	
//	protected $view, $cfg, $langPack, $utils;
	
	public function __construct($view,$params) {
		$this->view = $view;

        $this->cfg      = require_once ROOT_DIR.'/data/cfg/config.php';
		$this->langPack = require ROOT_DIR.'/data/cfg/lang.php';

        // get all of supported languages
        $this->langIDs  = array_keys($this->langPack);

        $this->model    = $params["model"];
        $this->lang     = $params["lang"];
        $this->subModel = $params["subModel"];

		$this->langPack = $this->langPack[ $params["lang"] ];

        $this->pageIDs  = explode(',',$this->langPack["pages"]);
        $this->media    = explode(',',$this->langPack["media"]);

        $this->utils = new Utils();

/*
        echo '<pre>obj: '; var_dump($params); echo '</pre>';
        ["model"]   => "home"
        ["lang"]    => "en"
        ["subModel"]=> ""
*/

	}
	
	abstract protected function render($str);


	
	public function action404() {
		header("HTTP/1.1 404 Not Found");
		header("Status: 404 Not Found");
	}

}

