<?php

namespace App\Controller;

use App\Core\Service\ViewManager;

class MainController
{
    public function home(): void
    {
        $viewManager = new ViewManager();
        $viewManager->render('main/home');
    }

    public function about(): void
    {
        echo 'A propos';
    }
}

