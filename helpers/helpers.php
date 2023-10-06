<?php

function dd(mixed ...$args): void
{
    echo '<pre style="direction:ltr;background: #333; padding: 1rem; margin: 1rem; border-left: red solid 14px; color: white;">';
    foreach ($args as $arg) var_dump($arg);
    echo '</pre>';
}

function site_url(string $route): string
{
    return $_ENV['BASE_URL'] . $route;
}

function assets(string $route): string
{
    return site_url('assets/' . $route);
}

function random_element(array $arr): array
{
    shuffle($arr);
    return array_pop($arr);
}

?>