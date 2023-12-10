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
        echo 'Connected'.PHP_EOL;
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function query($query, $params = [])
    {
        $stmt = $this->pdo->query($query);
        //or...
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);

        // TODO: will return the result of the query. The caller will need to know what to do with the result
    }

    public function applyMigrations()
    {
        $this->createMigrationsTable();
        $appliedMigrations = $this->getAppliedMigrations();

        $files = scandir(Application::$ROOT_DIR.'/migrations');
        $toApplyMigrations = array_diff($files, $appliedMigrations);
        
        $newMigrations = [];
        foreach ($toApplyMigrations as $migration) {
            if ($migration === '.' || $migration === '..') {
                continue;
            }
            
            require_once Application::$ROOT_DIR.'/migrations/'.$migration;
            $className = pathinfo($migration, $flags=PATHINFO_FILENAME);
            $instance = new $className();
            $this->log("Applying migration {$migration}".PHP_EOL);
            $instance->up();
            $this->log("Applied migration {$migration}.".PHP_EOL);
            $newMigrations[] = $migration;
            
            
        }
        if (!empty($newMigrations)) 
        {
            $this->saveMigrations($newMigrations);
        } else {
            $this->log("All migrations are applied".PHP_EOL);
        }
        
    }

    public function createMigrationsTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
            id INT(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)
            ENGINE=INNODB;");
    }

    public function getAppliedMigrations()
    {
        $query = "SELECT migration FROM migrations";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function saveMigrations($migrations)
    {
        // $str = implode(",", array_map(fn($m) => "('$m')", $migrations));
        $str = implode(",", array_map(function ($m) {
            return "('$m')";}, $migrations));
        $stmt = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES
            $str
        ");
        $stmt->execute();
    }

    protected function log( $message)
    {
        echo '['.date('Y-m-d H:i:s').'] - '.$message.PHP_EOL;
    }
}
?>