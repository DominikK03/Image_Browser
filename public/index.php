<?php

require '../src/vendor/autoload.php';
require '../src/functions.php';

define('STORAGE_PATH', '../public/storage');
define('VIEW_PATH', '../src/views');

use app\controllers\HomeController;
use app\controllers\ImageController;
use app\controllers\UploadController;
use app\Factories\ImageFactory;
use app\Kernel;
use app\Repositories\ImageRepository;
use app\Repositories\UploadRepository;
use app\Request;
use app\Router;
use app\Services\ImageService;
use app\Services\ImageValidator;
use app\Services\StorageData;
use app\Services\UploadService;
use app\TemplateRenderer;


$container = [];
$container[Router::class] = new Router();
$container[ImageFactory::class] = new ImageFactory();
$container[ImageValidator::class] = new ImageValidator();
$container[TemplateRenderer::class] = new TemplateRenderer();
$container[StorageData::class] = new StorageData(STORAGE_PATH);
$container[UploadService::class] = new UploadService($container[ImageFactory::class], $container[ImageValidator::class]);
$container[UploadRepository::class] = new UploadRepository();
$container[ImageRepository::class] = new ImageRepository($container[StorageData::class], $container[ImageFactory::class]);
$container[ImageService::class] = new ImageService($container[ImageRepository::class]);
$container[UploadController::class] = new UploadController($container[UploadService::class], $container[UploadRepository::class]);
$container[ImageController::class] = new ImageController($container[ImageService::class], $container[TemplateRenderer::class], $container[UploadController::class]);

$request = new Request($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD'], $_POST, $_GET, $_FILES);

$container[Router::class]->registerControllers(
        [
                ImageController::class,
                UploadController::class
        ]
);


$kernel = new Kernel($container);
$response = $kernel->handle($request);
