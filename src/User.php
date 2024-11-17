<?php

class User
{
    public int $id;
    public string $name;
    private $pdo;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
        $database = new Database();
        $this->pdo = $database->connect();
    }

    public function isUserExists(int $id): bool
    {
        $sql = "SELECT COUNT(*) FROM users WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);

        $count = $stmt->fetchColumn();
        return $count > 0;
    }

    public function update(int $id, string $name): string
    {
        if ($this->isUserExists($id)) {
            $sql = "UPDATE users SET name = :name WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':id', $id);
        } else {
            return "Пользователь не найден";
        }
    }
}
