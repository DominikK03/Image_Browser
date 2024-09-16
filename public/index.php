<?php

require '../src/vendor/autoload.php';
require '../src/functions.php';

define('STORAGE_PATH', '../public/storage');
define('VIEW_PATH', '../src/View');

use app\Controller\HomeController;
use app\Controller\MainPageController;
use app\Controller\UploadController;
use app\Factory\ImageFactory;
use app\Kernel;
use app\Repository\ImageRepository;
use app\Repository\UploadRepository;
use app\Request;
use app\Router;
use app\Service\ImageService;
use app\Service\ImageValidator;
use app\Service\StorageData;
use app\Service\UploadService;
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
$container[MainPageController::class] = new MainPageController($container[ImageService::class], $container[TemplateRenderer::class], $container[UploadController::class]);

$request = new Request($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD'], $_POST, $_GET, $_FILES);

$container[Router::class]->registerControllers(
        [
                MainPageController::class,
                UploadController::class
        ]
);


$kernel = new Kernel($container);
$response = $kernel->handle($request);
