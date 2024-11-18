<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '../src/Core/Util/Autoloader.php';

use App\Core\Util\Autoloader;
use App\Core\Kernel;

Autoloader::register();

$kernel = new Kernel();
$kernel->run();
