<?php

require_once '../src/Core/Util/Autoloader.php';

use App\Core\Util\Autoloader;
use App\Core\Kernel;

Autoloader::register();

$kernel = new Kernel();
$kernel->run();
