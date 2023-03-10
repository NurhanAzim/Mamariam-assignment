<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4a54ac181245c80b5d9608db224bf065
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Sistemorder\\Composer\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Sistemorder\\Composer\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4a54ac181245c80b5d9608db224bf065::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4a54ac181245c80b5d9608db224bf065::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4a54ac181245c80b5d9608db224bf065::$classMap;

        }, null, ClassLoader::class);
    }
}
