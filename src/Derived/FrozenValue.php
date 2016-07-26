<?php namespace Common\Dependency\Derived;

use Common\Dependency\Interfaces\IReadonlySingleValue;
use Common\Dependency\Interfaces\ISingleValue;

/**
 */
class FrozenValue implements IReadonlySingleValue
{
    /**
     * @var ISingleValue
     */
    protected $value;

    protected function __construct(ISingleValue $value)
    {
        $this->value = $value;
    }

    /**
     * @param ISingleValue $value
     * @return static
     */
    public static function wrap(ISingleValue $value)
    {
        if ($value instanceof static) {
            return $value;
        }
        return new static($value);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get()
    {
        return $this->value->get();
    }

    /**
     * @param string $key
     * @return bool
     */
    public function exists()
    {
        return $this->value->exists();
    }
}
 