<?php

namespace App\Core\Service;

use PDO;

abstract class AbstractRepository
{
    public function findAll(): array
    {
        $db = new PDO('mysql:host=db;dbname=movie-bucket', 'movie-bucket', 'movie-bucket');

        $stmt = $db->query('SELECT * FROM ' . $this->getTableName());
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    abstract protected function getTableName(): string;
}
