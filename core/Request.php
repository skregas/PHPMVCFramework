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
    public function getPath() {
        // return the current path from the URI
        $path = $_SERVER["REQUEST_URI"] ?? '/';
        $position = strpos($path, "?");
        if ($position === false) {
            return $path;
        } else {
            return substr($path, 0, $position);
        }
    }

    public function getMethod() {
        // return the request method from $_SERVER global
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    public function getBody() {
        // returns all the data from the request
    }
}
