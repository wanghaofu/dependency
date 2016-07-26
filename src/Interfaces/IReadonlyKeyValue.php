<?php namespace Common\Dependency\Interfaces;

    /**
     */

/**
 * 代表一组只读的key value
 */
interface IReadonlyKeyValue
{
    /**
     * @param string $key
     * @return mixed
     */
    public function get($key);

    /**
     * @param string $key
     * @return bool
     */
    public function exists($key);
}