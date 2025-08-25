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
 * Enum State
 *
 * Represents the possible states within the application.
 * Define specific states as enum cases.
 */
enum State {
    case CLOSED;
    case OPEN;
}
