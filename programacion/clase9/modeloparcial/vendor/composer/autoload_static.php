<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit40f27df70dd720747c7b92e62c906943
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'ModelPDO\\' => 9,
        ),
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
        'E' => 
        array (
            'Entidades\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ModelPDO\\' => 
        array (
            0 => __DIR__ . '/../..' . '/modelpdo',
        ),
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
        'Entidades\\' => 
        array (
            0 => __DIR__ . '/../..' . '/entidades',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit40f27df70dd720747c7b92e62c906943::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit40f27df70dd720747c7b92e62c906943::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
