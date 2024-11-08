<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit210dc6f22773054438c6be2f260696b0
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Hp\\Qlktx\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Hp\\Qlktx\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit210dc6f22773054438c6be2f260696b0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit210dc6f22773054438c6be2f260696b0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit210dc6f22773054438c6be2f260696b0::$classMap;

        }, null, ClassLoader::class);
    }
}
