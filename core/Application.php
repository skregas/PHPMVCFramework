<?php

namespace app\core;

/**
 * Class Application
 * 
 * @author skregas <skregas01@gmail.com>
 * @package app\core
 */
class Application {
    public  $router; // typed properties; available php +7.4
    public  $request;
    public function __construct() {
    
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run(){
        echo "<br />Application -> run method called\n";
        echo $this->router->resolve();
    }
}