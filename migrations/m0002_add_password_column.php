<?php

use app\core\Application;

/**
 * Summary of add_password_column
 * @author skregas <skregas01@gmail.com>
 * @package htdocs/PHPMVCFramework/migrations/m0002_add_password_column.php
 * @copyright (c) 2023
 */
class m0002_add_password_column {
    public function up()
    {
        echo "Applying migration".PHP_EOL;
        $db = Application::$app->db;
        $db->pdo->exec("ALTER TABLE users ADD COLUMN password VARCHAR(512) NOT NULL;");
    }

    public function down()
    {
        echo "Down migration".PHP_EOL;
        $db = Application::$app->db;
        $db->pdo->exec("ALTER TABLE users DROP COLUMN password;");
    }

}
?>