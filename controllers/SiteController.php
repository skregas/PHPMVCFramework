<?php

namespace app\controllers;

use app\core\Controller;

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
    public function handleContact() {
        //should be returned whenever we make the post request on the Contact form
        return "In SiteController: handling submitted data";
    }
}



?>