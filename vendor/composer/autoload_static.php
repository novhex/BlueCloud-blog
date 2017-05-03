<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitadceaa1db0bee4c54518799f485103d9
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Validator\\' => 10,
        ),
        'R' => 
        array (
            'Routes\\' => 7,
            'Router\\' => 7,
        ),
        'P' => 
        array (
            'Plugins\\' => 8,
            'Paginator\\' => 10,
        ),
        'F' => 
        array (
            'Fileuploader\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Validator\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core/Validator',
        ),
        'Routes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/routes',
        ),
        'Router\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core/Router',
        ),
        'Plugins\\' => 
        array (
            0 => __DIR__ . '/../..' . '/plug-ins',
        ),
        'Paginator\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core/Paginator',
        ),
        'Fileuploader\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core/Fileuploader',
        ),
    );

    public static $classMap = array (
        'Bootstrap' => __DIR__ . '/../..' . '/core/Bootstrap.php',
        'Core\\Controller\\Controller' => __DIR__ . '/../..' . '/core/Controller.php',
        'Core\\View\\View' => __DIR__ . '/../..' . '/core/View.php',
        'Database\\DBConnection\\DBConnection' => __DIR__ . '/../..' . '/database/DBconnection.php',
        'Fileuploader\\Fileuploader' => __DIR__ . '/../..' . '/core/Fileuploader/Fileuploader.php',
        'FluentPDO' => __DIR__ . '/../..' . '/core/FluentPDO/FluentPDO.php',
        'Helpers\\Encryption_helpers' => __DIR__ . '/../..' . '/helpers/Encryption_helper.php',
        'Helpers\\Geocode_helper' => __DIR__ . '/../..' . '/helpers/Geocode_helper.php',
        'Helpers\\System_helpers' => __DIR__ . '/../..' . '/helpers/System_helpers.php',
        'Paginator\\Paginator' => __DIR__ . '/../..' . '/core/Paginator/Paginator.php',
        'Plugins\\JCryption' => __DIR__ . '/../..' . '/plug-ins/jcryption.php',
        'Plugins\\Upload' => __DIR__ . '/../..' . '/plug-ins/upload.php',
        'Plugins\\sqAES' => __DIR__ . '/../..' . '/plug-ins/sqAES.php',
        'Router\\Router' => __DIR__ . '/../..' . '/core/Router/Router.php',
        'Routes\\Routes' => __DIR__ . '/../..' . '/routes/Routelist.php',
        'Validator\\Validator' => __DIR__ . '/../..' . '/core/Validator/Validator.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitadceaa1db0bee4c54518799f485103d9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitadceaa1db0bee4c54518799f485103d9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitadceaa1db0bee4c54518799f485103d9::$classMap;

        }, null, ClassLoader::class);
    }
}