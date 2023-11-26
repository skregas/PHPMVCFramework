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
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView("_404");
        }
        
        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)){
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }
        return call_user_func($callback, $this->request);
    }

    public function renderView($view, $params = []) {
        $layoutContent = $this->getLayoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function getLayoutContent()  {
        $layout = Application::$app->controller->layoutName;
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/$layout.php";
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