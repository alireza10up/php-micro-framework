<?php

/**
 * Dumps variables and expressions for debugging purposes.
 *
 * This function is similar to `var_dump` but provides better formatting and additional features:
 *   - Displays variables in a clear and readable format using a `<pre>` tag with custom styling.
 *   - Accepts multiple arguments, allowing you to dump the contents of several variables simultaneously.
 *   - Optionally accepts a second argument as a boolean:
 *     - `true`: Includes the variable name and type in the output (default).
 *     - `false`: Only displays the variable content.
 *
 * This function is intended to be used during development for debugging purposes and should be removed before deploying the application to production.
 *
 * @param mixed ...$args The variables or expressions to dump.
 * @return void
 *
 * @throws Exception If an argument is not a valid type.
 */
function dd(mixed ...$args): void
{
    $showLabels = func_get_args()[1] ?? true; // Get second argument (default to true)

    echo '<pre style="direction:ltr;background: #333; color: white; padding: 1rem; margin: 1rem; border-left: red solid 14px;">';

    foreach ($args as $arg) {
        if (!is_scalar($arg) && !is_object($arg) && !is_array($arg)) {
            throw new Exception('Invalid argument type for dd(): ' . gettype($arg));
        }

        if ($showLabels) {
            echo gettype($arg) . ' - ';
        }
        var_dump($arg);
        echo "\n";
    }

    echo '</pre>';
    die();
}

/**
 * Dumps variables and expressions for debugging purposes without stopping the script execution.
 *
 * This function is similar to `dd` but does not call `die()` after dumping the data.
 *
 * @param mixed ...$args The variables or expressions to dump.
 * @return void
 *
 * @throws Exception If an argument is not a valid type.
 */
function dump(mixed ...$args): void
{
    echo '<pre style="direction:ltr;background: #333; color: white; padding: 1rem; margin: 1rem; border-left: red solid 14px;">';

    foreach ($args as $arg) {
        if (!is_scalar($arg) && !is_object($arg) && !is_array($arg)) {
            throw new Exception('Invalid argument type for dump(): ' . gettype($arg));
        }

        var_dump($arg);
        echo "\n";
    }

    echo '</pre>';
}

/**
 * Gets the value of an environment variable
 *
 * @param string $key The name of the environment variable
 * @param string|null $default Optional default value (null by default)
 * @return string|null The value of the environment variable or the default value if not found
 */
function env(string $key, ?string $default = null): ?string
{
    if (array_key_exists($key, $_ENV)) {
        return $_ENV[$key] ?? null;
    }

    return $default;
}

/**
 * Generates a full URL for a given route.
 *
 * @param string $route The route to generate a URL for.
 * @return string The full URL for the given route.
 *
 * @example
 * echo site_url('about'); // Outputs: http://localhost/about
 */
function site_url(string $route): string
{
    return env('BASE_URL', 'localhost') . '/' . $route;
}


/**
 * Build Assets Url
 * 
 * @param string $route
 * @return string
 */
function assets(string $route): string
{
    return site_url('assets/' . $route);
}

/**
 * Include And Prepare Variables For Present View
 * 
 * @param string $name View Name
 * @param array $data 
 */
function view(string $name, array $data = [])
{
    extract($data);

    $path = str_replace('.', '/', $name);

    return include_once BASE_PATH . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $path . '.php';
}

?>