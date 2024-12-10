<?php

namespace App\Core\Service;

use PDO;

abstract class AbstractRepository
{
    protected PDO $connection;

    public function __construct(DatabaseManager $databaseManager)
    {
        $this->connection = $databaseManager->getConnection();
    }

    public function findAll(): array
    {
        $stmt = $this->connection->query('SELECT * FROM ' . $this->getTableName());
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): ?array
    {
        $query = 'SELECT * FROM ' . $this->getTableName() . ' WHERE id = :id';
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert(array $data): int
    {
        $keys = array_keys($data);
        $placeholders = array_fill(0, count($keys), '?');
        $query = sprintf('INSERT INTO %s (%s) VALUES (%s)', $this->getTableName(), implode(',', $keys), implode(',', $placeholders));

        $stmt = $this->connection->prepare($query);
        $stmt->execute(array_values($data));

        return $this->connection->lastInsertId();
    }

    abstract protected function getTableName(): string;
}
