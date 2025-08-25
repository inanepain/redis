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

namespace Inane\Redis\Exceptions;

/**
 * Exception thrown if an error which can only be found on runtime occurs.
 *
 * @implements \Inane\Exception\ExceptionInterface
 * @version 0.2.0
 */
class RuntimeException extends Exception implements ExceptionInterface {
}
