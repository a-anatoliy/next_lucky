<?php

class Route {

    const DEF_CONTROLLER_NAME = 'Main';

	public function start() {

//		if ($uri) $action_name = $uri;
//		$controller_name = $params["model"]."Controller";

        $pageProp = new Page($_SERVER["REQUEST_URI"]);
        $params   = $pageProp->setActionParams();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Form processing code
            if (isset($_POST["c"]) && ($_POST["c"] === "6w-1LdB0TAAAAAPoB8GKdbG-XOqq8QaZ-ft2VGQ3n")) {
                require ROOT_DIR .'/core/informer.php';
                $sucessMsg = $pageProp->langPack[ $params["lang"] ]["success"];
                $informer = new Informer($sucessMsg);
                $informer->informUs();
//                $retStr = sprintf('{ "code":"%s","message":"%s" }',$informer->isMsgSent,$informer->sucsMsg);
                $retStr = json_encode(['code' => $informer->isMsgSent, 'message'=> $informer->sucsMsg]);
                echo $retStr;
            }
            else { echo "you can't use this form"; }
            exit;
        }
        else {
            $cntrl_name  = $this::DEF_CONTROLLER_NAME.'Controller';
            $controller  = new $cntrl_name($params);
            $action_name = 'action'.$params['model'];
            if (method_exists($controller, $action_name)) {
                $controller->$action_name();
            }
            else {
                $controller->action404();
            }
        }


	}



}
