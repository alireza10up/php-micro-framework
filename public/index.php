<?php

use App\Core\Routing\Router;

try {
    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'bootstrap' . DIRECTORY_SEPARATOR . 'init.php';

    global $request;
    global $response;

    # start router
    $router = new Router($request, $response);
    $router->run();

} catch (\Error|\Exception $error) {
    $systemError = (function_exists('env')) ? env("DEBUG", false) ? ["systemMessage" => $error->getMessage()] : [] : [];

    if(!empty($response)) {
        $response->withStatusCode(500)->withJson(array_merge([
            "status" => false,
            "message" => "Internal Error"
        ], $systemError))->send();
    }

    echo 'nothing handled :(' . '</br>';
    echo 'system message : ' . $error->getMessage();
}