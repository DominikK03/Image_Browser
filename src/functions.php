<?php
function ddump($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

}
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
    return urlIs($value) ? 'active':'';
}