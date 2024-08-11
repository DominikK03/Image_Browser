<?php

require '../src/vendor/autoload.php';
require '../src/functions.php';

define('STORAGE_PATH', '../src/storage');
define('VIEW_PATH', '../src/views');

use app\Factories\UploadFactory;
use app\Kernel;
use app\controllers\HomeController;
use app\controllers\UploadController;
use app\Request;
use app\Router;
use app\Services\UploadService;


$container = [];
$container[Router::class] = new Router();
$container[UploadFactory::class] = new UploadFactory();
$container[UploadService::class] = new UploadService($container[UploadFactory::class]);
$container[HomeController::class] = new HomeController();
$container[UploadController::class] = new UploadController($container[UploadService::class]);

$request = new Request($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD'], $_POST, $_GET, $_FILES);

$container[Router::class]->registerControllers(
        [
                HomeController::class,
                UploadController::class
        ]
);


$kernel = new Kernel($container);
$response = $kernel->handle($request);
