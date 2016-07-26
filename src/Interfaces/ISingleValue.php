<?php namespace Common\Dependency\Interfaces;

/**
 * Interface ISingleValue
 * 代表一个可以读写的值
 */
interface ISingleValue extends IReadonlySingleValue
{

    /**
     * @param mixed $value
     * @return void
     */
    public function set($value);

    /**
     * @return void
     */
    public function delete();
}
