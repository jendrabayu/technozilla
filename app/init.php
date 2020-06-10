<?php

session_start();
date_default_timezone_set('Asia/Jakarta');
ini_set('display_errors', E_ALL);


require_once 'config.php';

require_once 'helpers/helpers.php';

require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'core/DB.php';
require_once 'core/Session.php';
require_once 'core/Redirect.php';
require_once 'core/Authentication.php';
