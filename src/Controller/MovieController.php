<?php

namespace App\Controller;

use App\Core\Service\AbstractController;

class MovieController extends AbstractController
{
    public function list(): void
    {
        $movies = [
            'Gladiator',
            'Die Hard',
            'La vague',
            'The Rock',
        ];

        $this->viewManager->render('movie/list', [
            'movies' => $movies,
        ]);
    }

    public function show(): void
    {
        $this->viewManager->render('movie/show');
    }
}

