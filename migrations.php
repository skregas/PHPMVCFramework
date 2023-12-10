<?php 

/**
 * User: skregas
 * Date: 2023/12/05
 * Time: 21:11
 */





 use app\core\Application;
 require_once(dirname(__FILE__)."/vendor/autoload.php");
 
 $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
 $dotenv->load();
 
 $config = [
     'db' => [
         'dsn' => $_ENV['DB_DSN'],
         'user' => $_ENV['DB_USER'],
         'password' => $_ENV['DB_PASSWORD']
     ]
 ];
 
 
$app = new Application(__DIR__, $config);

$app->db->applyMigrations();
 



?>