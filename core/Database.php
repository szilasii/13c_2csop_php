<?php
class Database {
    private $pdo;

    public function __construct($config) {
         $dsn = "mysql:host={$config['db']['host']};dbname={$config['db']['name']};charset=utf8mb4";
        $this->pdo = new PDO(
            $dsn,
            $config['db']['user'],
            $config['db']['password']
        );
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
    }

    public function query($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
    
    public function __destruct()
    {
        $this->pdo = null;
    }

}