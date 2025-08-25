<?php

/**
 * Inane: Redis
 *
 * Wrapper around the php redis extension.
 *
 * $Id$
 * $Date$
 *
 * PHP version 8.4
 *
 * @author Philip Michael Raab<philip@cathedral.co.za>
 * @package inanepain\redis
 * @category redis
 *
 * @license UNLICENSE
 * @license https://unlicense.org/UNLICENSE UNLICENSE
 *
 * _version_ $version
 */

declare(strict_types=1);

namespace Inane\Redis;

use Redis;

use function class_exists;

use Inane\Redis\Exceptions\{
    ExceptionCode,
    RuntimeException
};

/**
 * Redis Client
 *
 * @version 0.1.0
 */
class RedisClient {
    /**
     * Redis
     *
     * @var \Redis
     */
    private Redis $connection;

    /**
     * Connection State
     *
     * @var \Lab\Redis\State
     */
    private State $state = State::CLOSED;

    /**
     * Connection configuration
     *
     * @var array<string, string|string[]|int>
     */
    protected array $config = [
        'host' => '127.0.0.1',
        'port' => 6379,
        'timeout' => 0.0,
        // 'auth' => ['phpredis', 'phpredis'],
        // 'ssl' => ['verify_peer' => false],
    ];

    /**
     * Current db index
     *
     * @var int
     */
    protected int $dbIndex = 0;

    /**
     * Cached key types shared by all Clients
     *
     * @var array
     */
    private static array $typeCache = [];

    /**
     * Redis Client
     *
     * @param array $config connection details
     *
     * @return void
     */
    public function __construct(array $config = []) {
        $this->initialise();
    }

    /**
     * Check that everything ok to use class
     *
     * @return void
     *
     * @throws \Inane\Redis\Exceptions\RuntimeException
     */
    private function initialise(): void {
        if (!class_exists('Redis')) {
            $code = ExceptionCode::MissingExtension;
            throw new RuntimeException("{$code->message()} Redis. Use `pecl` to install.", $code->value);
        }
    }

    /**
     * Gets and Connects to the redis server
     *
     * @return \Redis client
     */
    private function getConnection(): Redis {
        if (!isset($this->connection)) {
            $this->connection = new Redis();
            $this->state = $this->connection->connect(...$this->config) ? State::OPEN : State::CLOSED;
        }
        return $this->connection;
    }

    /**
     * GET
     *
     * @param string $name key
     *
     * @return null|\Redis value
     */
    public function __get(string $name): null|Redis {
        return match($name) {
            'redis' => $this->getConnection(),
            default => null,
        };
    }

    /**
     * Cache Lookup
     *
     * Returns key type or db cache if no key given
     *
     * @param null|string|\Lab\Redis\Type $key
     * @return null|array|\Lab\Redis\TYPE cached data
     */
    public function cache(?string $key = null): null|array|TYPE {
        return $key === null ? static::$typeCache[$this->dbIndex] : (static::$typeCache[$this->dbIndex][$key] ?? null);
    }

    /**
     * db index
     *
     * @return int dbIndex
     */
    public function db(): int {
        return $this->dbIndex;
    }

    /**
     * Swap db
     *
     * @param int $db1 db
     * @param int $db2 db
     *
     * @return bool success
     */
    public function swapDb(int $db1, int $db2): bool {
        if ($this->getConnection()->swapdb($db1, $db2)) {
            list(static::$typeCache[$db1], static::$typeCache[$db2]) = [static::$typeCache[$db2], static::$typeCache[$db1]];
            return true;
        }

        return false;
    }

    /**
     * Select db
     *
     * @param int $dbIndex db
     *
     * @return int dbIndex
     */
    public function selectDb(int $dbIndex = 0): int {
        if ($this->getConnection()->select($dbIndex)) $this->dbIndex = $dbIndex;
        if ((static::$typeCache[$this->dbIndex] ?? false) === false) static::$typeCache[$this->dbIndex] = [];

        return $this->dbIndex;
    }

    // public function create(Type $type): TypeInterface {
    // }

    /**
     * Show Variables
     *
     * @param string $filter filter name by patter
     *
     * @return array keys
     */
    public function keys(string $filter = '*'): array {
        $ks = $this->getConnection()->keys($filter);

        foreach ($ks as $k) $this->type($k);

        return $ks;
    }

    /**
     * Variable exists
     *
     * @param string $key name
     *
     * @return bool exists
     */
    public function exists(string $key): bool {
        $exists = $this->getConnection()->exists($key);
        if ($exists)
            if (!$this->cache($key)) $this->type($key);
        else; else if ($this->cache($key)) unset(static::$typeCache[$this->dbIndex][$key]);

        return (bool)$exists;
    }

    /**
     * Variable type
     *
     * @param string $key name
     *
     * @return \Inane\Redis\Type type
     */
    public function type(string $key): ?Type {
        if (!$this->cache($key)) static::$typeCache[$this->dbIndex][$key] = Type::from($this->getConnection()->type($key));

        return $this->cache($key);
    }

    /**
     * Get the value related to the specified key
     *
     * expire_unit
     *  - EX:  expire time in seconds
     *  - PX:  expire time in milliseconds
     *  - EXAT:  expire time in seconds since UNIX epoch
     *  - PXAT:  expire time in milliseconds since UNIX epoch
     *  - PERSIST:  remove the expiration from the key
     *
     * @param string $key name
     * @param array|null $expire [expire_unit => time] e.g. ['EX' => 10] expire in ten seconds
     *
     * @return string|bool value or *false* if key does not exist
     */
    public function get(string $key, ?array $expire = null): string|bool {
        if ($expire)
            return $this->getConnection()->getEx($key, $expire);

        return $this->getConnection()->get($key);
    }

    /**
     * Get the value related to the specified key
     *
     * expire_unit
     *  - EX:  expire time in seconds
     *  - PX:  expire time in milliseconds
     *  - EXAT:  expire time in seconds since UNIX epoch
     *  - PXAT:  expire time in milliseconds since UNIX epoch
     *  - PERSIST:  remove the expiration from the key
     *
     * expire
     * The array can take two values.
     *  - the *expire_unit* with the *time* as its value
     *  - *XX* set if key does NOT exist or *NX* set if key exist
     *
     * @param string $key name
     * @param string|int $value the value
     * @param int|array|null $expire [expire_unit => time] e.g. ['EX' => 10] expire in ten seconds OR only if key exists ['XX', 'EX' => 10]
     *
     * @return string|bool value or *false* if key does not exist
     */
    public function set(string $key, int|string $value, int|array|null $expire = null): string|bool {
        if ($expire)
            return $this->getConnection()->set($key, $value, $expire);
            // return $this->getConnection()->setEx($key, $value, $expire);

        return $this->getConnection()->set($key, $value);
    }

    /**
     * Increment the number stored at key by one. If the second argument is filled, it will be used as the integer value of the increment
     *
     * @param string $key name
     * @param int|null $value amount to increment value
     *
     * @return string|int the new value
     */
    public function incr(string $key, ?int $value = null): string|int {
        if ($value)
            return $this->getConnection()->incr($key, $value);

        return $this->getConnection()->incr($key);
    }

    /**
     * Decrement the number stored at key by one. If the second argument is filled, it will be used as the integer value of the decrement
     *
     * @param string $key name
     * @param int|null $value amount to decrement value
     *
     * @return string|int the new value
     */
    public function decr(string $key, ?int $value = null): string|int {
        if ($value)
            return $this->getConnection()->decr($key, $value);

        return $this->getConnection()->decr($key);
    }
}
