<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Application;
use app\core\Request;

/**
 * Summary of SiteController
 * @author skregas <skregas01@gmail.com>
 * @package htdocs/PHPMVCFramework/controllers/
 * @copyright (c) 2023
 */
class SiteController extends Controller {
    public function home() {
        $params = [
            "name" => "skregas"
       ];
        return $this->render("home", $params);
    }
    public function contact() {
        return $this->render("contact");
    }
    public function handleContact(Request $request) {
        //should be returned whenever we make the post request on the Contact form
        $body = $request->getBody();
        // return "In SiteController: handling submitted data";
        echo '<pre>';
        var_dump ($body);
        echo '</pre>';
        exit;
    }
}



?>