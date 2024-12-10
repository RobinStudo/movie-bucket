<?php

namespace App\Repository;

use App\Core\Service\AbstractRepository;

class MovieRepository extends AbstractRepository
{
    protected function getTableName(): string
    {
        return 'movie';
    }
}
