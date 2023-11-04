<?php

namespace app\core;

/**
 * Class Router
 * 
 * @author skregas <skregas01@gmail.com>
 * @package app\core
 */
class Router {
    public  $request;
    public function __construct(Request $request) {
        $this->request = $request;
    }

    protected $routes = [];
    /**
     * Will be built up as an associated array
     * Example:
     * [
     *  'get' = [
     *      '/' => $callback,
     *      '/contact' => $callback,
     *  ],
     * 'post' = [
     *      '/' => $callback,
     *      '/register' => $callback
     *  ]
     * ] <-- end of outermost array
     */
    public function get($path, $callback){
        echo "<br />Router -> get method called\n";
        // method #1
        // $this->routes[$path] = $callback;
        // method  #2
        // associated array
        $this->routes['get'][$path] = $callback;


    }

    public function resolve(){
        // TODO: determine current path (URL)
        $path = $this->request->getPath();
        // TODO: determine current method (GET, POST, etc)
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            echo "<br />" . $path . " Not Found\n <br />";
            exit;
        }

        echo call_user_func($callback);
        echo '<pre>';
        var_dump ($path, $method, $callback, $this->routes); 
        echo '</pre>';
        exit;
        

    }
}