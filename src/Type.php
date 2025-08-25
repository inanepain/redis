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

/**
 * Value Types
 *
 * redis data types:
 *  - Redis::REDIS_STRING - String
 *  - Redis::REDIS_SET - Set
 *  - Redis::REDIS_LIST - List
 *  - Redis::REDIS_ZSET - Sorted set
 *  - Redis::REDIS_HASH - Hash
 *  - Redis::REDIS_NOT_FOUND - Not found / other
 *
 * @version 1.0.0
 */
enum Type: int {
    case STRING = 1;
    case SET = 2;
    case LIST = 3;
    case ZSET = 4;
    case HASH = 5;
    case STREAM = 6;
    case OTHER = 0;
}
