<?php

namespace app\core;
/**
 * Summary of Response
 * @author skregas <skregas01@gmail.com>
 * @package htdocs/PHPMVCFramework/core/Response.php
 * @copyright (c) 2023
 */
class Response {
    public function __construct() {
        
    }

    public function setStatusCode(int $code) {
        
        // http_response_code($code); // this doesn't update the code according to Chrome's Inspect tool
        // http_response_code();
        // but modifying the header itself does
        if ($code == 404) {
            header("HTTP/1.1 404 Not Found", true, $code);
        }
    }
}

?>