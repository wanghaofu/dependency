<?php namespace Common\Dependency;

use Pimple\Container;

class Dependency
{
    protected static $container = null;
    protected static $instance = [];

    const CONFIG = 'config';

    protected function __construct()
    {
        self::initContainer();
    }

    /**
     * @return static
     */
    public static function instance()
    {
        $class = get_called_class();
        if (!isset(self::$instance[$class])) {
            self::$instance[$class] = new static;
        }

        return self::$instance[$class];
    }

    protected static function initContainer()
    {
        if (is_null(self::$container)) {
            self::$container = new Container();
        }
    }

    /**
     * @return \Pimple\Container
     */
    public function getContainer()
    {
        return self::$container;
    }

    protected function fetch($key)
    {
        return self::$container[$key];
    }

    public static function import(array $dependencies)
    {
        self::initContainer();

        foreach ($dependencies as $key => $value) {
            self::$container[static::prefix($key)] = $value;
        }
    }

    /**
     * @return mixed
     */
    public function packageConfig($key)
    {
        return $this->packageFetch(static::CONFIG)->get($key);
    }

    protected function packageFetch($key)
    {
        return self::$container[static::prefix($key)];
    }

    /**
     * return "package.$key";
     *
     * @param $key
     * @return string
     */
    public static function prefix($key)
    {
        $class = static::class;
        return "$class.$key";
    }
}
