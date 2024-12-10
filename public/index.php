<?php

require_once '../vendor/autoload.php';
require_once '../src/Core/Util/Autoloader.php';

use App\Core\Util\Autoloader;
use App\Core\Kernel;

Autoloader::register();

const __BASE_URL__ = 'http://localhost';

$kernel = new Kernel();
$kernel->run();
