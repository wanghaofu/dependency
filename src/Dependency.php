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
     * 单例 工厂作用
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

    /**
     *  容器 ioc
     */
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

    /**
     * @desc 获取
     * @return mixed
     * @description  resource
     */
    public function packageConfig($key)
    {
        return $this->packageFetch(static::CONFIG)->get($key);
    }


    /**
     * @desc 获取 same as packageConfig
     * @return mixed
     * @description  resource
     */
    public function getConfig($key)
    {
        return $this->packageConfig($key);
    }

    /**
     * self::import  self::packageFetch  是一对操作  却别是给key加前缀
     * @desc 导入配置 设置操作
     * @param array $dependencies
     */
    public static function import(array $dependencies)
    {
        self::initContainer();
        foreach ($dependencies as $key => $value) {
            self::$container[static::prefix($key)] = $value;
        }
    }
    /**
     * @param $key
     *
     * @return mixed
     */
    protected function packageFetch($key)
    {
        return self::$container[static::prefix($key)];
    }


    /**
     * @desc 获取容器值 获取保存的信息 keyValue形式的获取
     * @param $key
     *
     * @return mixed
     */
    protected function fetch($key)
    {
        return self::$container[$key];
    }

    /**
     * return "package.$key";
     *
     * @param $key
     * @return string
     */
    private static function prefix($key)
    {
        $class = static::class;
        return "$class.$key";
    }



}
