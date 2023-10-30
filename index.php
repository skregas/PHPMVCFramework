<?php

use PhpMyAdmin\Plugins\TwoFactor\Application;

$app = new Application();

$app->router->get('/', function() {
    echo 'Hello World';
});

$app->run();
?>