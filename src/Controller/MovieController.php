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
        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $data = [
                'title' => htmlspecialchars($_POST['title'] ?? ''),
                'description' => htmlspecialchars($_POST['description'] ?? ''),
                'released_at' => htmlspecialchars($_POST['released_at'] ?? ''),
            ];

            $movieId = $this->movieRepository->insert($data);

            header(sprintf('Location: %s?id=%s', $this->router->generateUrl('movie_show'), $movieId));
        }

        $this->viewManager->render('movie/new');
    }

    /*
        TODO - Dans le même controller, quand la méthode est POST : on récupère les data depuis $_POST
        TODO - Puis on insert en BDD depuis une méthode de l'AbstractRepo
    */
}

