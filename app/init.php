<?php

session_start();

use App\Core\App as App;

require __DIR__ . '/../vendor/autoload.php';

require_once 'config.php';
require_once 'functions.php';

define('INC_ROOT', dirname(__DIR__));

$app = new App();
