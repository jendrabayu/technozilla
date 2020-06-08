<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'pweb_online_shop');
define('IMG_PATH', 'public/images/');


require_once 'app/init.php';

use App\Core\App;

$app = new App;
