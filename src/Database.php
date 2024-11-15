<?php

class Database
{
    private $host = 'localhost';
    private $db = 'user';
    private $user = 'root';
    private $pass = 'root';
    private $charset = 'utf8';
    private $pdo;

    public function connect(): PDO
    {
        if ($this->pdo === null) {
            $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
            $opt = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $this->pdo = new PDO($dsn, $this->user, $this->pass, $opt);
        }
        return $this->pdo;
    }

    public function getUsers(): void
    {
        $pdo = $this->connect();
        $sql = "SELECT * FROM users";
        $result = $pdo->query($sql);
        $rows = $result->fetchAll();

        foreach ($rows as $row) {
            echo "ID: " . $row['id'] . " Имя: " . $row['name'] . PHP_EOL;
        }
    }
}
