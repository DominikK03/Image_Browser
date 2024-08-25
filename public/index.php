<?php

require '../src/vendor/autoload.php';
require '../src/functions.php';

define('STORAGE_PATH', '../public/storage');
define('VIEW_PATH', '../src/views');

use app\controllers\HomeController;
use app\controllers\UploadController;
use app\Factories\UploadFactory;
use app\Kernel;
use app\Repositories\DisplayRepository;
use app\Request;
use app\Router;
use app\Services\DisplayService;
use app\Services\ImageValidator;
use app\Services\StorageData;
use app\Services\UploadService;


$container = [];
$container[Router::class] = new Router();
$container[UploadFactory::class] = new UploadFactory();
$container[ImageValidator::class] = new ImageValidator();
$container[StorageData::class] = new StorageData(STORAGE_PATH);
$container[DisplayService::class] = new DisplayService($container[StorageData::class]);
$container[DisplayRepository::class] = new DisplayRepository($container[DisplayService::class]);
$container[UploadService::class] = new UploadService($container[UploadFactory::class], $container[ImageValidator::class]);
$container[HomeController::class] = new HomeController($container[DisplayService::class]);
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
