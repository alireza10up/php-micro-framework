<?php

namespace App\Utils;

use App\Exceptions\ConfigFileNotFoundException;

class Config
{
    /**
     * Reads the contents of a configuration file.
     *
     * This method attempts to locate and read the contents of a configuration file
     * stored in the `configs` directory relative to the base path defined by `BASE_PATH`.
     *
     * @param string $filename The name of the configuration file without the `.php` extension
     * @throws ConfigFileNotFoundException If the configuration file is not found
     * @return array The contents of the configuration file as an associative array
     */
    public static function getFileContent(string $filename): array
    {
        $filePath = realpath(BASE_PATH . "/configs/" . $filename . ".php");

        if (!$filePath) throw new ConfigFileNotFoundException();

        return require $filePath;
    }

    /**
     * Retrieves a configuration value from a file.
     *
     * This method first calls `getFileContent` to read the contents of the specified
     * configuration file. It then:
     *
     *  - If `$key` is null, returns the entire configuration as an associative array.
     *  - If `$key` is provided, it retrieves the value associated with that key from the
     *    configuration array. If the key does not exist, it returns `null`.
     *
     * @param string $filename The name of the configuration file without the `.php` extension
     * @param string|null $key (optional) The key of the configuration value to retrieve
     * @return mixed The configuration value associated with the key, or the entire configuration
     *               as an array if no key is provided. If the key is not found, returns `null`.
     * @throws ConfigFileNotFoundException If the configuration file is not found
     */
    public static function get(string $filename, string $key = null)
    {
        $fileContents = self::getFileContent($filename);

        if (is_null($key)) return $fileContents;

        return $fileContents[$key] ?? null;
    }
}