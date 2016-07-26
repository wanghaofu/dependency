<?php namespace Common\Dependency\Derived;

use Common\Dependency\Interfaces\IKeyValue;
use Common\Dependency\Traits\KeyValueTrait;

class ObjectKeyValue implements IKeyValue
{
    use KeyValueTrait;

    protected $object;

    /**
     * ObjectKeyValue constructor.
     * @param $object
     */
    protected function __construct($object)
    {
        $this->object = $object;
    }

    public static function wrap($object)
    {
        if ($object instanceof static) {
            return $object;
        }

        if (is_object($object)) {
            return new static($object);
        }

        throw new \InvalidArgumentException();
    }

    /**
     * @inheritDoc
     */
    public function set($key, $value)
    {
        $this->object->{$key} = $value;
    }

    /**
     * @inheritDoc
     */
    public function delete($key)
    {
        unset($this->object->{$key});
    }

    /**
     * @inheritDoc
     */
    public function get($key)
    {
        return $this->object->{$key};
    }

    /**
     * @inheritDoc
     */
    public function exists($key)
    {
        return isset($this->object->{$key});
    }
}
