<?php

namespace App\Controller;

use App\Core\Service\AbstractController;
use PDO;

class MovieController extends AbstractController
{
    public function list(): void
    {
        $db = new PDO('mysql:host=db;dbname=movie-bucket', 'movie-bucket', 'movie-bucket');

        $stmt = $db->query('SELECT * FROM movie');
        $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);

        dump($movies);

        $this->viewManager->render('movie/list', [
            'movies' => $movies,
        ]);
    }

    public function show(): void
    {
        $this->viewManager->render('movie/show');
    }
}

