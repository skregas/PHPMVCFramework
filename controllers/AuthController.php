<?php 

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;

/**
 * Class AuthController
 * 
 * @author skregas <skregas01@gmail.com>
 * @package app\controllers
 */

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isPost()) {
            return "AuthController::login -> Handle submitted data";
        }
        $this->setLayout("auth");
        return $this->render("login");
    }

    public function register(Request $request)
    {
        $registerModel = new RegisterModel;
        if ($request->isPost()) {
            $registerModel->loadData($request->getBody());
            // echo '<pre>';
            // var_dump ( $registerModel );
            // echo '</pre>';
            // exit;
            if ($registerModel->validate() && $registerModel->register()) {
                return "Success";
            }
            echo '<pre>';
            var_dump ( $registerModel->errors );
            echo '</pre>';
            exit;
            // if errors, render the same form. 
            return $this->render("register", [
                "model"=> $registerModel
            ]);
            
            //TODO: render any validation errors
            // return "AuthController::register ->Handle submitted data";
        }
        $this->setLayout("auth");
        return $this->render("register", [
            "model"=> $registerModel
        ]);
    }
}
?>