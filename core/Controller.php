<?php

namespace app\core;

use app\core\Application;

 /**
  * Summary of Controller
  * @author skregas <skregas01@gmail.com>
  * @package htdocs/PHPMVCFramework/core/Controller.php
  * @copyright (c) 2023
  */

class Controller {

    public $layoutName = "main";
    public function render($view, $params = []) {
        return Application::$app->router->renderView($view, $params);
    }

    public function setLayout($layout)
    {
        $this->layoutName = $layout;
    }
}


?>