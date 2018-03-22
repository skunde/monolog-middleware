<?php


namespace MonologMiddleware\Validator;


use MonologMiddleware\Exception\MonologConfigException;

/**
 * Class AbstractHandlerConfigValidator
 * @package MonologMiddleware\Validator
 */
class AbstractHandlerConfigValidator
{
    /**
     * @var array
     */
    protected $handlerConfigArray;

    /**
     * AbstractHandlerConfigValidator constructor.
     * @param $handlerConfigArray
     */
    public function __construct($handlerConfigArray)
    {
        $this->handlerConfigArray = $handlerConfigArray;
    }

    /**
     * @return bool
     * @throws MonologConfigException
     */
    public function validate(): bool
    {
        if ($this->hasLevel()) {
            return true;
        }

        throw new MonologConfigException("Missing data in handler configuration");
    }

    /**
     * @return bool
     * @throws MonologConfigException
     */
    public function hasLevel(): bool
    {
        if (isset($this->handlerConfigArray['level'])) {
            return true;
        }

        throw new MonologConfigException("Monolog level is missing from config");
    }
}
