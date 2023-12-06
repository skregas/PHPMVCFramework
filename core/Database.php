<?php

namespace app\core;


/**
 * Summary of Database
 * @author skregas <skregas01@gmail.com>
 * @package htdocs/PHPMVCFramework/core/Database.php
 * @copyright (c) 2023
 */
class Database {
    public $pdo;
    public function __construct($config) 
    {
        $dsn = $config['dsn'] ??'';
        $user = $config['user'] ??'';
        $password = $config['password'] ??'';
        $this->pdo = new \PDO($dsn, $user, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
}
?>