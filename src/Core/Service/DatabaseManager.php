<?php

namespace App\Core\Service;

use PDO;

class DatabaseManager
{
    private array $config;
    private PDO $connection;

    public function __construct(ConfigurationProvider $configurationProvider)
    {
        $this->config = $configurationProvider->load('database');

        $dsn = sprintf('mysql:host=%s;dbname=%s', $this->config['host'], $this->config['database']);
        $this->connection = new PDO($dsn, $this->config['user'], $this->config['password']);
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }
}
