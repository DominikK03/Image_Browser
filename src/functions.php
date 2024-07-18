<?php
function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}

function urlIs(string $value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function hoverStatus($value){
    echo urlIs($value) ? 'bg-gray-900 text-white':'text-gray-300 hover:bg-gray-700 hover:text-white';
}