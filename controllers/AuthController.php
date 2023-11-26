<?php 

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use LDAP\Result;

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
        if ($request->isPost()) {
            return "AuthController::register ->Handle submitted data";
        }
        $this->setLayout("auth");
        return $this->render("register");
    }
}
?>