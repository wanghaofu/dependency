<?php namespace Common\Dependency\Interfaces;

/**
 * Interface IKeyValue
 * 代表一组可以读写的key value
 */
interface IKeyValue extends IReadonlyKeyValue
{

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function set($key, $value);

    /**
     * @param string $key
     * @return void
     */
    public function delete($key);
}
