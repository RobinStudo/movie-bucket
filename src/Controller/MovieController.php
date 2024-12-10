<?php

namespace App\Controller;

use App\Core\Service\AbstractController;
use App\Core\Service\ViewManager;
use App\Repository\MovieRepository;

class MovieController extends AbstractController
{
    public function __construct(
        protected ViewManager $viewManager,
        private MovieRepository $movieRepository,
    ) {
    }

    public function list(): void
    {
        $movies = $this->movieRepository->findAll();

        $this->viewManager->render('movie/list', [
            'movies' => $movies,
        ]);
    }

    public function show(): void
    {
        $this->viewManager->render('movie/show');
    }
}

