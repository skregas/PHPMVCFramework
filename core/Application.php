<?php

namespace app\core;


/**
 * Class Application
 * 
 * @author skregas <skregas01@gmail.com>
 * @package app\core
 */
class Application {
    public static $ROOT_DIR;
    public static  $app;
    public   $router; 
    public   $request;
    public  $response;
    public function __construct($rootPath) {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response(); 
        $this->router = new Router($this->request, $this->response);
    }

    public function run(){
        // echo "<br />Application -> run method called\n";
        echo $this->router->resolve();
    }
}