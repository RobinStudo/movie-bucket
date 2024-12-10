<?php

namespace App\Core\Service;

abstract class AbstractController
{
    public function __construct(
        protected Router $router,
        protected ViewManager $viewManager
    ) {
    }
}
