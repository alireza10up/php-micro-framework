<?php
// const default
define('BASE_PATH', dirname(__DIR__));
// autoload composer
include BASE_PATH . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
// env var bootstrap
$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->safeLoad();
// hepers func
include BASE_PATH . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'helpers.php';