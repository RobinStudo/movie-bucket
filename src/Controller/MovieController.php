<?php

namespace App\Controller;

use App\Core\Service\AbstractController;
use App\Core\Service\Router;
use App\Core\Service\ViewManager;
use App\Repository\MovieRepository;
use Exception;

class MovieController extends AbstractController
{
    public function __construct(
        protected Router $router,
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
        $id = $_GET['id'] ?? null;
        if (!$id) {
            throw new Exception('Unable to retrieve movie');
        }

        $movie = $this->movieRepository->findById((int) $id);

        $this->viewManager->render('movie/show', [
            'movie' => $movie,
        ]);
    }

    public function new(): void
    {
        $errors = [];
        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $data = [
                'title' => htmlspecialchars($_POST['title'] ?? ''),
                'description' => htmlspecialchars($_POST['description'] ?? ''),
                'released_at' => htmlspecialchars($_POST['released_at'] ?? ''),
            ];

            if (empty($data['title']) || empty($data['description']) || empty($data['released_at'])) {
                $errors[] = 'Tous les champs sont obligatoires';
            }

            if (strlen($data['title']) > 60) {
                $errors[] = 'Le titre doit contenir moins de 60 caracteres';
            }

            if (!strtotime($data['released_at'])) {
                $errors[] = 'Date de sortie non valide';
            }

            if (count($errors) === 0) {
                $movieId = $this->movieRepository->insert($data);
                header(sprintf('Location: %s?id=%s', $this->router->generateUrl('movie_show'), $movieId));
            }
        }

        $this->viewManager->render('movie/new', [
            'errors' => $errors,
        ]);
    }
}

