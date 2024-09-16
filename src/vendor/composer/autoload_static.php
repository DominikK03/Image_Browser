<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5a1e4b9c6f190d3ad24e7babb4a97f74
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'app\\Response' => __DIR__ . '/../..' . '/Response.php',
        'app\\Router' => __DIR__ . '/../..' . '/Router.php',
        'app\\controllers\\HomeController' => __DIR__ . '/../..' . '/Controller/HomeController.php',
        'app\\controllers\\UploadController' => __DIR__ . '/../..' . '/Controller/UploadController.php',
        'app\\models\\UpdateImage' => __DIR__ . '/../..' . '/Model/UpdateImage.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5a1e4b9c6f190d3ad24e7babb4a97f74::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5a1e4b9c6f190d3ad24e7babb4a97f74::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5a1e4b9c6f190d3ad24e7babb4a97f74::$classMap;

        }, null, ClassLoader::class);
    }
}
