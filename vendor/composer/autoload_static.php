<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit41b25d99fba836fed399a012f25e7672
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit41b25d99fba836fed399a012f25e7672::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit41b25d99fba836fed399a012f25e7672::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
