<?php

declare(strict_types=1);

namespace Inane\Redis\Types;

use Exception;
use Redis;

use function call_user_func_array;
use function method_exists;

use Inane\Redis\{
    Exceptions\ExceptionCode,
    Exceptions\LogicException,
    Exceptions\TypeSetupException,
    RedisClient,
    Type
};

/**
 * Redis String Type
 *
 * @version 0.1.0
 * @package Lab\Redis
 */
abstract class AbstractType implements TypeInterface {
    public function __construct(
        /**
         * Redis Client
         */
        private RedisClient $client,
        /**
         * Unique name
         */
        protected string $key
    ) {
        if (method_exists($this, 'bootstrap')) call_user_func_array([$this, 'bootstrap'], []);
    }

    /**
     * Get Type
     *
     * @return \Inane\Redis\Type Type
     */
    abstract public function getType(): Type;

    /**
     * Get the value of key
     */
    public function getKey() {
        return $this->key;
    }

    /**
     * Set the value of key
     *
     * @TODO: think this would be akin to rename?
     */
    public function setKey($key): self {
        $code = ExceptionCode::MethodStub;
        throw new LogicException($code->message() . __CLASS__ . '::' . __METHOD__, $code->value);

        // $this->key = $key;

        return $this;
    }

    /**
     * Variable exists
     *
     * @param string $key name
     *
     * @return bool exists
     */
    public function exists(): bool {
        return $this->client()->exists($this->getKey());
    }

    /**
     * Get the value of connection
     */
    protected function client(): \Inane\Redis\RedisClient {
        return $this->client;
    }

    /**
     * Get Backend
     *
     * @return \Redis
     */
    protected function conn(): \Redis {
        return $this->client()->redis;
    }
}
