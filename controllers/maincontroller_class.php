<?php


class MainController extends AbstractController {

//	protected $header, $menu, $footer, $title, $meta_desc, $meta_key;

    public function __construct() {
		parent::__construct(new View(DIR_TMPL));
		$this->m = new MenuController($this);
    }
	
	public function action404() {
		parent::action404();
		$this->title     = "Страница не найдена - 404";
		$this->meta_desc = "Запрошенная страница не существует.";
		$this->meta_key  = "страница не найдена, страница не существует, 404";
		
		$content = $this->view->render("404", array(), true);
		
		$this->render($content);
	}
	
	public function actionHome() {
//		$this->title     = "Главная страница";
//		$this->meta_desc = "Описание главной страницы.";
//		$this->meta_key  = "описание, описание главной страницы";

        $params = array();

        $params["intro"] = $this->langPack["intro"];
        $params["carouselImages"] = $this->utils->buildCarouselImages(ROOT_DIR.'/i/sessions/dayOne');

//        $this->header    = $this->view->render("header", array(), true);
//        $this->footer    = $this->view->render("footer", array(), true);

        $this->carousel  = $this->view->render("carousel", $params, true);
        $content = $this->view->render("index", $params, true);

		$this->render($content);
	}
	
	public function actionPage() {
		$this->title     = "Внутренняя страница";
		$this->meta_desc = "Описание внутренней страницы.";
		$this->meta_key  = "описание, описание внутренней страницы";
		
		$content = $this->view->render("page", array(), true);
		
		$this->render($content);
	}
	
	protected function render($str) {

//        $menu = new MenuController($this->actionPage,$this->lang);
//        $menu = new MenuController($this);
//        $menu = new Menu($this);
//        $menu = new MenuController();

		$params = array();
		$params["title"]     = $this->langPack["title"];
		$params["meta_desc"] = $this->langPack["meta_desc"];
		$params["meta_key"]  = $this->langPack["meta_key"];

//		$params["header"]    = $this->header;
//		$params["footer"]    = $this->footer;

        $this->actionPage = 'home';
		$params["header"]    = $this->view->render("header", array(), true);
		$params["carousel"]  = $this->actionPage == 'home' ? $this->carousel : '';

		$params["menu"]      = $this->bootstrapItems();

		$params["footer"]    = $this->view->render("footer", array(), true);
		$params["content"]   = $str;
		$this->view->render(MAIN_LAYOUT, $params);
	}

    function bootstrapItems() {
        $items=$this->_m;
//        var_dump($items);
//        echo "<pre>";print_r($items);echo "</pre>";
        $outString ="";

        // Starting from items at root level
        if( !is_array($items) ) { $items = $items->roots(); }

        foreach( $items as $item ) {
            echo "<pre>ITEM: ";print_r($item);echo "</pre><hr>";

//            $class = $hClass = '>';
//            if($item->hasChildren()) { $class=' class="dropdown">'; }
//            $outString = '<li'.$class;
//
//            $outString .='<a href="'. $item->link->get_url().'"';
//            if($item->hasChildren()) { $hClass=' class="dropdown-toggle" data-toggle="dropdown">'; }
//            $outString .= $hClass;
//
//            $outString .= $item->link->get_text();
//            $caret = '</a>';
//            if($item->hasChildren()) { $caret = '<b class="caret"></b></a>'; }
//            $outString .= $caret;
//                $outString .= $item->link->get_text() . " | ";
                echo $item->link->get_text() . " | ";
//                $outString .= $item->link->get_url();
//            $outString .= $item->hasChildren() ? ' class="dropdown">' : '>';
//            $outString .= '<a href="' . $item->link->get_url() .'""'
//                . $item->hasChildren() ? ' class="dropdown-toggle" data-toggle="dropdown">' : '>'  ;
//            $outString .=  $item->link->get_text() . $item->hasChildren() ? ' <b class="caret"></b> </a>' : '</a>';
            $outString .= '</li>';

            return $outString;
        }


/*
        foreach( $items as $item ) {
            ?>
            <li<?php if($item->hasChildren()): ?> class="dropdown"<?php endif ?>>
                <a href="<?php echo $item->link->get_url() ?>" <?php if($item->hasChildren()): ?> class="dropdown-toggle" data-toggle="dropdown" <?php endif ?>>
                    <?php echo $item->link->get_text() ?> <?php if($item->hasChildren()): ?> <b class="caret"></b> <?php endif ?></a>

                <?php if($item->hasChildren()): ?>
                    <ul class="dropdown-menu">
                        <?php $this->bootstrapItems( $item->children() ) ?>
                    </ul>
                <?php endif ?>
            </li>
            <?php
        }
*/
    }

}
