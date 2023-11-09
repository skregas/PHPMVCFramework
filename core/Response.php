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
        // This does work as expected WHEN there is no other preceding output, ie. echo statements
        http_response_code($code);
        
    }
}

?>