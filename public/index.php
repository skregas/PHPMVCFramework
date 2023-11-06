<?php

require_once(dirname(__FILE__)."/../vendor/autoload.php");

use app\core\Application;

$app = new Application(dirname(__DIR__));

$app->router->get('/', "home");

$app->router->get('/contact', "contact");

$app->run();
?>