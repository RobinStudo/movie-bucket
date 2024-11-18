<?php

require_once '../src/Core/Kernel.php';
require_once '../src/Core/Service/Router.php';
require_once '../src/Controller/MainController.php';
require_once '../src/Controller/MovieController.php';

$kernel = new Kernel();
$kernel->run();
