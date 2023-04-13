<?php

function dd(mixed $arg)
{
    echo '<pre style="direction:ltr;background: #333; padding: 1rem; margin: 1rem; border-left: red solid 14px; color: white;">';
    var_dump($arg);
    echo '</pre>';
}

?>