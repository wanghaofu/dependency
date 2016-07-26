<?php namespace Common\Dependency\Interfaces;

/**
 * Interface IReadonlySingleValue
 * 代表一个只读值
 */
interface IReadonlySingleValue
{
    /**
     * @return mixed
     */
    public function get();

    /**
     * @return bool
     */
    public function exists();
}
