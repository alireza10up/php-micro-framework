<?php
# const default
define('BASE_PATH', dirname(__DIR__));
# autoload composer
include BASE_PATH . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
# env var bootstrap
$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->safeLoad();
# debug
if ($_ENV['DEBUG'] ?? false) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}
# init Objects
$request = new App\Core\Http\Request();
# helpers func
include BASE_PATH . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'helpers.php';
# routing system
include BASE_PATH . DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR . 'web.php';