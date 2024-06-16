<?php

namespace App\Core\Http;

use App\Exceptions\FileNotFoundException;
use App\Exceptions\SingletonException;
use JetBrains\PhpStorm\NoReturn;

/**
 * Immutable Response class to manage HTTP responses.
 */
final class Response
{
    private static ?Response $instance = null;
    private int $statusCode;
    private array $headers;
    private string $content;

    /**
     * @throws SingletonException
     */
    public function __construct()
    {
        if (self::$instance !== null) {
            throw new SingletonException();
        }
        $this->statusCode = 200;
        $this->headers = [];
        $this->content = '';
    }

    /**
     * Gets the single instance of the Response class.
     *
     * This method implements the Singleton pattern to ensure only one instance
     * of the Response class exists throughout the application.
     *
     * @return Response The single instance of the Response class
     */
    public static function getInstance(): Response
    {
        if (self::$instance === null) {
            self::$instance = new Response();
        }

        return self::$instance;
    }

    /**
     * Creates a new Response instance.
     *
     * @return self
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * Sets the status code.
     *
     * @param int $code The status code
     * @return self
     */
    public function withStatusCode(int $code): self
    {
        $this->statusCode = $code;
        return $this;
    }

    /**
     * Gets the status code.
     *
     * @return int The status code
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * Sets a header.
     *
     * @param string $name The header name
     * @param string $value The header value
     * @return self
     */
    public function withHeader(string $name, string $value): self
    {
        $this->headers[$name] = $value;
        return $this;
    }

    /**
     * Removes a header.
     *
     * @param string $name The header name
     * @return self
     */
    public function withoutHeader(string $name): self
    {
        unset($this->headers[$name]);
        return $this;
    }

    /**
     * Sets the response content as text.
     *
     * @param string $text The text content
     * @return self
     */
    public function withText(string $text): self
    {
        $this->content = $text;
        return $this;
    }

    /**
     * Sets the response content as JSON.
     *
     * @param array $data The data to be encoded as JSON
     * @return self
     */
    public function withJson(array $data): self
    {
        $this->content = json_encode($data);
        $this->withHeader('Content-Type', 'application/json');
        return $this;
    }

    /**
     * Sets the response content as a file.
     *
     * @param string $filePath The path to the file
     * @return self
     * @throws FileNotFoundException If the file does not exist
     */
    public function withFile(string $filePath): self
    {
        if (!file_exists($filePath)) {
            throw new FileNotFoundException($filePath);
        }

        $this->withHeader('Content-Type', mime_content_type($filePath));
        $this->withHeader('Content-Length', filesize($filePath));
        $this->withHeader('Content-Disposition', 'attachment; filename="' . basename($filePath) . '"');
        $this->content = file_get_contents($filePath);
        return $this;
    }

    /**
     * Sets a redirect header.
     *
     * @param string $url The redirect URL
     * @return self
     */
    public function withRedirect(string $url): self
    {
        $this->withHeader('Location', $url);
        $this->statusCode = 302;
        return $this;
    }

    /**
     * Sends the response.
     */
    #[NoReturn] public function send(): void
    {
        http_response_code($this->statusCode);
        foreach ($this->headers as $name => $value) {
            header("$name: $value");
        }
        echo $this->content;
        die();
    }
}
