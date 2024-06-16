<?php
# base constance
define('BASE_PATH', dirname(__DIR__));
# auto load composer
require_once BASE_PATH . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
# load configs
$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->safeLoad();
# debug
if ($_ENV['DEBUG'] ?? null === true) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}
# init Objects
$request = new App\Core\Http\Request();
$response = App\Core\Http\Response::getInstance();
# helpers
require_once BASE_PATH . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'helpers.php';
# routing system
include BASE_PATH . DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR . 'api.php';