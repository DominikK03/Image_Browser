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
use app\Service\UploadImage;


$container = [];
$container[Router::class] = new Router();
$container[UploadImage::class] = new UploadImage();
$container[HomeController::class] = new HomeController();
$container[UploadController::class] = new UploadController();

$request = new Request($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD'], [],[], $_FILES);

$container[Router::class]->registerControllers(
        [
                HomeController::class,
                UploadController::class
        ]
);

$kernel = new Kernel($container);
$response = $kernel->handle($request);
echo $response->getContent();
