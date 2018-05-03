<?php

abstract class AbstractController {
	
//	protected $view, $cfg, $langPack, $utils;
	
	public function __construct($view,$params) {
		$this->view = $view;

        $this->cfg      = require CONFIG;
		$this->langPack = require ROOT_DIR.'/data/cfg/lang.php';

        $this->utils = new Utils();
        $this->dbh = $this->utils->lemmeIn($this->cfg["db"]);

        $this->lngsArray = $this->utils->getSupportedLanguages($this);

        // get all of supported languages
        $this->langIDs  = array_keys($this->langPack);
//        $this->langIDs  = array_values($this->lngsArray);

        $this->model    = $params["model"];
        $this->lang     = $params["lang"];
        $this->subModel = $params["subModel"];

		$this->langPack = $this->langPack[ $params["lang"] ];

        $this->title = ucfirst($params["model"]);
        foreach (array("meta_desc","meta_key") as $key) {
                $this->$key = $this->langPack[$key];
        }

//        $this->pageIDs  = explode(',',$this->langPack["pages"]);
//        $this->media    = explode(',',$this->langPack["media"]);
/*
        echo '<pre>obj: '; var_dump($params); echo '</pre>';
*/

	}
	
	abstract protected function render($str);


	
	public function action404($res) {
		header("HTTP/1.1 404 Not Found");
		header("Status: 404 Not Found");
	}

}

