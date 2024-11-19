<?php

namespace App\Controller;

use App\Core\Service\AbstractController;

class MainController extends AbstractController
{
    public function home(): void
    {
        $this->viewManager->render('main/home');
    }

    public function about(): void
    {
        echo 'A propos';
    }
}

