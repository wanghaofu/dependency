<?php namespace Common\Dependency\Traits;



trait SingletonTrait
{
    public static function instance()
    {
        if (isset(self::$instance)) {
            return self::$instance;
        }

        return self::$instance = new static;
    }

    protected static $instance;

    protected function __construct()
    {
    }
}
