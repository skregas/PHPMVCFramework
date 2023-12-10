<?php

use app\core\Application;

/**
 * Summary of m0001_initial
 * @author skregas <skregas01@gmail.com>
 * @package htdocs/PHPMVCFramework/migrations/m0001_initial.php
 * @copyright (c) 2023
 */
class m0001_initial {
    public function up()
    {
        echo "Applying migration".PHP_EOL;
        $db = Application::$app->db;
        $SQL = "CREATE TABLE users (
            id INT(5) AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL,
            f_name VARCHAR(255) NOT NULL,
            l_name VARCHAR(255) NOT NULL,
            status TINYINT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP )
            ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        echo "Down migration".PHP_EOL;
        $db = Application::$app->db;
        $SQL = "DROP TABLE users";
        $db->pdo->exec($SQL);
    }

}
?>