<?php

require '../functions.php';


$uri = $_SERVER['REQUEST_URI'];

$routes = [
      '/' => '../controllers/home.php',
      '/upload' => '../controllers/upload.php',
];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
}