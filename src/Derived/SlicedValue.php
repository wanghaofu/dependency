<?php namespace Common\Dependency\Derived;

use Common\Dependency\Interfaces\IKeyValue;
use Common\Dependency\Interfaces\ISingleValue;
use Common\Dependency\Traits\SingleValueTrait;

/**
 */
class SlicedValue implements ISingleValue
{
    use SingleValueTrait;
    /**
     * @var IKeyValue
     */
    private $keyValue;
    /**
     * @var string
     */
    private $key;

    /**
     * @param IKeyValue $keyValue
     * @param string $key
     */
    public function __construct($keyValue, $key)
    {

        $this->keyValue = $keyValue;
        $this->key = $key;
    }

    /**
     * @param IKeyValue $keyValue
     * @param string $key
     * @return static
     */
    public static function slice($keyValue, $key)
    {
        return new static($keyValue, $key);
    }

    /**
     * @return mixed
     */
    public function get()
    {
        return $this->keyValue->get($this->key);
    }

    /**
     * @return bool
     */
    public function exists()
    {
        return $this->keyValue->exists($this->key);
    }

    /**
     * @param mixed $value
     * @return void
     */
    public function set($value)
    {
        $this->keyValue->set($this->key, $value);
    }

    /**
     * @return void
     */
    public function delete()
    {
        $this->keyValue->delete($this->key);
    }
}
 