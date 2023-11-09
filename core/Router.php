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
    public  $response;
    /**
     * Summary of __construct
     * @param \app\core\Request $request
     * @param \app\core\Response $response
     * @author skregas
     */
    public function __construct(Request $request, Response $response) {
        $this->request = $request;
        $this->response = $response;
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
        // associated array
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback){
        // associated array
        $this->routes['post'][$path] = $callback;
    }

    public function resolve(){
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView("_404");
        }
        
        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)){
            $callback[0] = new $callback[0]();
        }
        return call_user_func($callback);
    }

    public function renderView($view, $params = []) {
        $layoutContent = $this->getLayoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function getLayoutContent()  {
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/main.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params = []) {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }
}