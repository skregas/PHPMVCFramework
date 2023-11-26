<?php

namespace app\core;


 /**
  * Request class
  * Handles incoming requests
  *
  * @author skregas <skregas01@gmail.com>
  * @package htdocs/PHPMVCFramework/core/Request.php
  * @copyright (c) 2023
  */

class Request
{
    public function getPath()
    {
        // return the current path from the URI
        $path = $_SERVER["REQUEST_URI"] ?? '/';
        $position = strpos($path, "?");
        if ($position === false) {
            return $path;
        } else {
            return substr($path, 0, $position);
        }
    }

    /**
     * Summary of getMethod
     * @return string
     * @author skregas
     */
    public function method()
    {
        // return the request method from $_SERVER global
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }
    public function isGet()
    {
        return $this->method() === "get";
    }
    public function isPost()
    {
        return $this->method() === "post";
    }

    public function getBody()
    {
        // returns all the data from the request
        $body = [];
        if ($this->method() === "get") {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->method() === "post") {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }
}