<?php

namespace App\Controller;

use App\Core\Service\AbstractController;

class MovieController extends AbstractController
{
    public function list(): void
    {
        $this->viewManager->render('movie/list');
    }

    public function show(): void
    {
        $this->viewManager->render('movie/show');
    }
}

