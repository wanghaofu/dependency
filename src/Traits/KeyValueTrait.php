<?php namespace Common\Dependency\Traits;


use Common\Dependency\Derived\FrozenKeyValue;
use Common\Dependency\Derived\PrefixKeyValue;
use Common\Dependency\Derived\SlicedValue;

trait KeyValueTrait
{
    /**
     * 只读
     *
     * @return FrozenKeyValue
     */
    public function freeze()
    {
        return FrozenKeyValue::wrap($this);
    }

    /**
     * 转化为ISingleValue
     * @param $key
     * @return SlicedValue
     */
    public function slice($key)
    {
        return SlicedValue::slice($this, $key);
    }

    /**
     * 添加前缀
     * @param $prefix
     * @return PrefixKeyValue
     */
    public function prefix($prefix)
    {
        return PrefixKeyValue::wrap($this, $prefix . $this->getPrefixDelimiter());
    }

    /**
     * 定义前缀分隔符
     * @return string
     */
    protected function getPrefixDelimiter()
    {
        return '!!';
    }
}
