<?php namespace Common\Dependency\Traits;


use Common\Dependency\Derived\FrozenValue;

trait SingleValueTrait
{
    public function freeze()
    {
        return FrozenValue::wrap($this);
    }
}
