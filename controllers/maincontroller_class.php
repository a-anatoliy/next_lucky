<?php


class MainController extends AbstractController {

//	protected $header, $menu, $footer, $title, $meta_desc, $meta_key, $params;

    public function __construct($params) {
		parent::__construct(new View(DIR_TMPL),$params);
    }

//        printf("<pre>languages ARE equal [%s] == [%s]</pre>",$cookieLang,$sessinLang);
//echo '<pre>obj: '; var_dump($this); echo '</pre>';
//         echo '<pre>obj: '; var_dump($this); echo '</pre>';

	public function action404() {
		parent::action404();
		$this->title     = "Страница не найдена - 404";
		$this->meta_desc = "Запрошенная страница не существует.";
		$this->meta_key  = "страница не найдена, страница не существует, 404";
		
		$content = $this->view->render("404", array(), true);
		
		$this->render($content);
	}
	
	public function actionHome() {

        $params = array();

        $params["intro"] = $this->langPack["intro"];
        $params["carouselImages"] = $this->utils->buildCarouselImages(ROOT_DIR.'/i/sessions/dayOne');

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

        $params["intro"] = $this->langPack["intro"];
        $content = $this->view->render("about", $params, true);
		
		$this->render($content);
	}

    public function actionContact() {
//		$this->title     = "Внутренняя страница";
//		$this->meta_desc = "Описание внутренней страницы.";
//		$this->meta_key  = "описание, описание внутренней страницы";

//		$content = $this->view->render("about", array(), true);
//        $params = array();
//        $params = $this->langPack;

//        $params["form"] = 'contact form goes here ';

        $content = $this->view->render("contact", $this->langPack, true);

        $this->render($content);
    }

	protected function render($str) {
        $menu = new MenuController($this);

		$params = array();
		$params["title"]     = $this->langPack["title"];
		$params["meta_desc"] = $this->langPack["meta_desc"];
		$params["meta_key"]  = $this->langPack["meta_key"];

//		$params["header"]    = $this->header;
//		$params["footer"]    = $this->footer;

//        $this->actionPage = 'home';
		$params["header"]    = $this->view->render("header", array(), true);
		$params["carousel"]  = $this->model == 'home' ? $this->carousel : '';

		$params["menu"]      = $menu->buildMenu();

		$params["footer"]    = $this->view->render("footer", array(), true);
		$params["content"]   = $str;
		$this->view->render(MAIN_LAYOUT, $params);
	}

}
