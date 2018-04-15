<?php

class Route {

    const DEF_CONTROLLER_NAME = 'Main';

	public function start() {

//		if ($uri) $action_name = $uri;
//		$controller_name = $params["model"]."Controller";

        $pageProp = new Page($_SERVER["REQUEST_URI"]);
        $params   = $pageProp->setActionParams();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Form processing code
            if (isset($_POST["c"]) && ($_POST["c"] === "6w-1LdB0TAAAAAPoB8GKdbG-XOqq8QaZ-ft2VGQ3n")) {
                require_once ROOT_DIR .'/core/informer.php';
                require_once ROOT_DIR .'/core/ency.php';
                $informer = new Informer( $pageProp->langPack[ $params["lang"] ] );
                $informer->informUs();

                echo json_encode(['code' => $informer->sentStatusCode, 'message'=> $informer->sentMsgStatus]);

                $countIt = new Ency($informer);
                $countIt->evidence();
            }
            else { echo json_encode(['code' => 500, 'message'=> "you can't use this form"]); }

            exit;
        }
        else {
            require_once ROOT_DIR .'/core/anthology.php';
            $cfg     = require CONFIG;
            $utils   = new Utils();
            $hit_obj = new anthology();

            $guestParam = array();
            $guestParam["ip"]     = $utils->getVisitorIP();
            $guestParam["status"] = isset($_SERVER['REDIRECT_STATUS']) ? $_SERVER['REDIRECT_STATUS'] : 404;
            $guestParam["reqUri"] = $_SERVER["REQUEST_URI"];
            $guestParam["refer"]  = $_SESSION["origURL"];

            $hit_obj->unique_visits = true;
            $hit_obj->hit_count_file = ROOT_DIR . $cfg["stat"]["hits"];

            if(!isset($_SESSION["counted"])){
                $hit_obj->recordHit($guestParam);
                $_SESSION["counted"]=1;
            }

            $cntrl_name  = $this::DEF_CONTROLLER_NAME.'Controller';
            $controller  = new $cntrl_name($params);
            $action_name = 'action'.$params['model'];

            if (method_exists($controller, $action_name)) {
                $controller->$action_name();
            }
            else {
                require_once ROOT_DIR .'/core/pathfinder.php';
                $data = new pathfinder($guestParam);
                $controller->action404($data->result);
            }
        }


	}



}
