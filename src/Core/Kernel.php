<?php

class Kernel
{
    public function run(): void
    {
        $controller = new MainController();
        $controller->home();
    }
}
