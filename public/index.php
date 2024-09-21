<?php

require '../vendor/autoload.php';

define('STORAGE_PATH', '../public/storage');
define('TEMPLATE_PATH', '../templates');

use app\Controller\MainPageController;
use app\Controller\UploadController;
use app\Core\DI\Container;
use app\Core\HTTP\Request;
use app\Core\HTTP\Router;
use app\Factory\ImageFactory;
use app\Kernel;
use app\Repository\ImageRepository;
use app\Repository\ImageRepositoryInterface;
use app\Repository\UploadRepository;
use app\Repository\UploadRepositoryInterface;
use app\Service\ImageService;
use app\Service\ImageValidator;
use app\Service\StorageData;
use app\Service\UploadService;
use app\Util\TemplateRenderer;

$container = new Container();
$container->setConfig(StorageData::class, 'repositoryPath', STORAGE_PATH);
$container->bindInterface(ImageRepositoryInterface::class,ImageRepository::class);
$container->bindInterface(UploadRepositoryInterface::class, UploadRepository::class);
$container->register(
    Router::class, ImageFactory::class,
    ImageValidator::class, TemplateRenderer::class,
    StorageData::class, UploadService::class,
    UploadRepository::class, ImageRepository::class,
    ImageService::class, UploadController::class,
    MainPageController::class)->build();


$request = new Request($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD'], $_POST, $_GET, $_FILES);

$container->get(Router::class)->registerControllers(
        [
                MainPageController::class,
                UploadController::class
        ]
);


$kernel = new Kernel($container);
$response = $kernel->handle($request);
echo $response->getContent();
