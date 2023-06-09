<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7f7a419f7abffb71235e4f904186d28c
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Laminas\\Ldap\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Laminas\\Ldap\\' => 
        array (
            0 => __DIR__ . '/..' . '/laminas/laminas-ldap/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7f7a419f7abffb71235e4f904186d28c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7f7a419f7abffb71235e4f904186d28c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
