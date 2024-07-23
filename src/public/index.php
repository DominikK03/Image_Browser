<?php

require __DIR__.'/../vendor/autoload.php';
require '../functions.php';

define('STORAGE_PATH', __DIR__.'/../storage');
define('VIEW_PATH', __DIR__.'/../views');

use app\App;
use app\controllers\HomeController;
use app\controllers\UploadController;
use app\Router;


$router = new Router();

$router->registerControllers(
        [
                HomeController::class,
                UploadController::class,
        ]
);


(new App(
        $router,
        ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']]
))->run();