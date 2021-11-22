<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit067e0761d8c40f46e6e72d756796d9e7
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit067e0761d8c40f46e6e72d756796d9e7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit067e0761d8c40f46e6e72d756796d9e7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit067e0761d8c40f46e6e72d756796d9e7::$classMap;

        }, null, ClassLoader::class);
    }
}
