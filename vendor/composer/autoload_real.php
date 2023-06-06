<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitf09a5dcc653de5574e9ffd4c0895842c
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitf09a5dcc653de5574e9ffd4c0895842c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitf09a5dcc653de5574e9ffd4c0895842c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitf09a5dcc653de5574e9ffd4c0895842c::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
