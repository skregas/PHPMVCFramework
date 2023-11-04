<?php

namespace app\core;

/**
 * Class Request
 * 
 * @author skregas <skregas01@gmail.com>
 * @package app\core
 */

class Request
{
    public function getPath() {
        // return the current path from the URI
        // TODO: strip and return everything but the path
        $path = $_SERVER["REQUEST_URI"] ?? '/';
        $position = strpos($path, "?");
        if ($position === false) {
            return $path;
        } else {
            return substr($path, 0, $position);
        }
        echo '<pre>';
        var_dump ($position);
        echo '</pre>';
        exit;

    }

    public function getMethod() {
        // return the request method from $_SERVER global
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    public function getBody() {
        // returns all the data from the request
    }
}
