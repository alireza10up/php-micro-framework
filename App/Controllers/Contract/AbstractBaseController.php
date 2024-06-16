<?php

namespace App\Controllers\Contracts;

use App\Core\Http\Response;
use JetBrains\PhpStorm\NoReturn;

abstract class AbstractBaseController
{
    private Response $response;

    public function __construct()
    {
        $this->response = Response::getInstance();
    }

    /**
     * Sends a JSON response.
     *
     * @param array $data The data to be encoded as JSON
     * @param int $statusCode The HTTP status code
     * @return void
     */
    #[NoReturn] protected function jsonResponse(array $data, int $statusCode = 200): void
    {
        $this->response->withStatusCode($statusCode)
            ->withHeader('Content-Type', 'application/json')
            ->withText(json_encode($data))
            ->send();
    }
}