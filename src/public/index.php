<?php

use controllers\Router;

require __DIR__.'/../vendor/autoload.php';
require '../functions.php';


$router = new Router();

$homeroute = new \controllers\Request('/','get');

$router->AddRoute($homeroute,'Controller');

dd($router->getController($homeroute));





