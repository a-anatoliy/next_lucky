<?php


class MainController extends AbstractController {

//	protected $header, $menu, $footer, $title, $meta_desc, $meta_key, $params;

    public function __construct($params) {
		parent::__construct(new View(DIR_TMPL),$params);
    }

//        printf("<pre>languages ARE equal [%s] == [%s]</pre>",$cookieLang,$sessinLang);
//echo '<pre>obj: '; var_dump($this); echo '</pre>';
//         echo '<pre>obj: '; var_dump($this); echo '</pre>';
//        $this->utils->writeFile(ROOT_DIR.'/data/dumper.txt',serialize($this->info));


	public function action404($res) {
        parent::action404($res);
/*
$guestParam["ip"]
$guestParam["status"]
$guestParam["reqUri"]
$guestParam["refer"]
 */
        $message = json_decode($res, true);

//echo '<pre>obj: '; var_dump($message); echo '</pre>';

		$this->title = $this->meta_desc = $message["code"];
		$this->meta_key = $message["message"];

//		$message["title"] = $message["meta_desc"] = $message["code"];
//        $message["meta_key"] = $message["message"];

		$content = $this->view->render("404", $message, true);
		
		$this->render($content);

	}
	
	public function actionHome() {

        $params = array();

        $params["intro"] = $this->langPack["intro"];
        $params["carouselImages"] = $this->utils->buildCarouselImages($this->getImgIndex());


//        $this->header    = $this->view->render("header", array(), true);
//        $this->footer    = $this->view->render("footer", array(), true);

        $this->carousel  = $this->view->render("carousel", $params, true);
        $content = $this->view->render("index", $params, true);

		$this->render($content);
	}
	
	public function actionAbout() {
//		$this->title     = "Внутренняя страница";
//		$this->meta_desc = "Описание внутренней страницы.";
//		$this->meta_key  = "описание, описание внутренней страницы";

//		$content = $this->view->render("about", array(), true);
        $params = array();
        $params["title"] = "About";

        $params["intro"] = $this->langPack["intro"];
        $content = $this->view->render("about", $params, true);

		$this->render($content);
	}

    public function actionMedia() {

//		$content = $this->view->render("about", array(), true);
        $params = array();

        foreach ($this->cfg["mediaDirs"] as $n => $dir) {
            $params[$n]  = $this->utils->getImgContainer($this->getImgIndex(),$dir);
            $params[$n."Title"] = $this->langPack["media"][$n];
        }

        $content = $this->view->render("media", $params, true);

        $this->render($content);
    }

    public function actionContact() {
        $formFactor = $this->utils->sqlSelect($this->dbh,QueryMap::SELECT_FORM_PHRAZEZ,["3"]);

        $content="";
        $result = array();
        foreach ($formFactor as $item) {
            foreach ($item as $k => $v) {
                $newKey="";
//                if (preg_match("/required/i",$k) && $v > 0) {
//                    $newKey=sprintf("%s_required",$item["field_name"]);
//                } else {
                    $newKey=sprintf("%s_%s",$item["field_name"],$k);
//                }

                $result[$newKey] = $v;
            }
        }
//        var_dump($result);
        $content = $this->view->render("contact", $result, true);
        $this->render($content);
    }

    public function getImgIndex() {
        return ROOT_DIR.$this->cfg["site"]["imgIndex"];
    }

	protected function render($str) {
        $menu = new MenuController($this);
        $menus = array(
            "baseMenu" => $menu->renderBase(),
            "langsMenu"=> $menu->renderLangs()
        );

		$params = array();

		foreach (array("meta_desc","meta_key") as $key) {
//		    if (empty($params[$key])) {
//            $params[$key] = sprintf("%s - %s",$this->$key, $this->langPack[$key]);
            $params[$key] = $this->$key;
//            }
        }

        if (preg_match("/home/i",$this->title)) {
            $params["title"] = $this->langPack["title"];
        } else {
            $params["title"] = $this->title." - ".$this->langPack["title"];
        }

//		$params["meta_desc"] = $this->langPack["meta_desc"];
//		$params["meta_key"]  = $this->langPack["meta_key"];

//		$params["header"]    = $this->header;
//		$params["footer"]    = $this->footer;

//        $this->actionPage = 'home';
		$params["header"]    = $this->view->render("header", array(), true);
		$params["carousel"]  = $this->model == 'home' ? $this->carousel : '';

//		$params["menu"]      = $menu->buildMenu();
		$params["menu"]      = $this->view->render("menu", $menus, true);

		$params["footer"]    = $this->view->render("footer", array(), true);
		$params["content"]   = $str;
		$this->view->render(MAIN_LAYOUT, $params);
	}

}
