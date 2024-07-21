<?php

require __DIR__.'/../vendor/autoload.php';
require '../functions.php';

define('STORAGE_PATH', __DIR__.'/../storage');
define('VIEW_PATH', __DIR__.'/../views');

use app\controllers\HomeController;
use app\Router;


$router = new Router();

$router
        ->get('/',[HomeController::class, 'index'])
        ->post('/upload',[HomeController::class,'upload']);

echo $router->getController($_SERVER['REQUEST_URI'],$_SERVER['REQUEST_METHOD']);
