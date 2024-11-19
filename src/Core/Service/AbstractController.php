<?php

namespace App\Core\Service;

abstract class AbstractController
{
    protected ViewManager $viewManager;

    public function __construct()
    {
        $this->viewManager = new ViewManager();
    }
}
