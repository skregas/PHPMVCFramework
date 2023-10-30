<?php


class Application {
    public Router $router; // typed properties; available php +7.4
    public function __construct() {
    
        $this->router = new Router();
    }
}