<?php

namespace App\Controller;

use App\Core\Service\AbstractController;

class MovieController extends AbstractController
{
    public function list(): void
    {
        echo 'Liste de films';
    }

    public function show(): void
    {
        echo 'Vue film';
    }
}

