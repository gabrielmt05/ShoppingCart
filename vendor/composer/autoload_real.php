<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit55550c4a0db899d58f6e9735d06f2a0f
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

        spl_autoload_register(array('ComposerAutoloaderInit55550c4a0db899d58f6e9735d06f2a0f', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit55550c4a0db899d58f6e9735d06f2a0f', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit55550c4a0db899d58f6e9735d06f2a0f::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
