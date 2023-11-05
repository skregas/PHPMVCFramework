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
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            return "<br />The path " . $path . " was not found\n <br />";
        }
        
        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        return call_user_func($callback);
    }

    public function renderView($view) {
        include_once __DIR__."/../views/$view.php";
    }
}