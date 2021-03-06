<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit611bf34965bd36da52631b165f375c44
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '667aeda72477189d0494fecd327c3641' => __DIR__ . '/..' . '/symfony/var-dumper/Resources/functions/dump.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Component\\VarDumper\\' => 28,
            'Symfony\\Component\\Translation\\' => 30,
        ),
        'D' => 
        array (
            'Database\\' => 9,
        ),
        'C' => 
        array (
            'Carbon\\' => 7,
        ),
        'A' => 
        array (
            'App\\Traits\\' => 11,
            'App\\Models\\' => 11,
            'App\\Interfaces\\' => 15,
            'App\\Classes\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Component\\VarDumper\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/var-dumper',
        ),
        'Symfony\\Component\\Translation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/translation',
        ),
        'Database\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Database',
        ),
        'Carbon\\' => 
        array (
            0 => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon',
        ),
        'App\\Traits\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App/Traits',
        ),
        'App\\Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App/Models',
        ),
        'App\\Interfaces\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App/Interfaces',
        ),
        'App\\Classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App/Classes',
        ),
    );

    public static $prefixesPsr0 = array (
        'W' => 
        array (
            'WideImage' => 
            array (
                0 => __DIR__ . '/..' . '/smottt/wideimage/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit611bf34965bd36da52631b165f375c44::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit611bf34965bd36da52631b165f375c44::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit611bf34965bd36da52631b165f375c44::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
