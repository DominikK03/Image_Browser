<?php

require __DIR__.'/../vendor/autoload.php';
require '../functions.php';

define('STORAGE_PATH', __DIR__.'/../storage');
define('VIEW_PATH', __DIR__.'/../views');

use app\Kernel;
use app\controllers\HomeController;
use app\controllers\UploadController;
use app\Request;
use app\Router;

$container = [];
$container[Router::class] = new Router();
$container[HomeController::class] = new HomeController();

$router = new Router();
$request = new Request($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD'],[],[],$_FILES);

$router->registerControllers(
        [
                HomeController::class,
                UploadController::class,
        ]
);

$kernel = new Kernel($container);
$kernel->handle($request);
$response = $kernel->getContent();