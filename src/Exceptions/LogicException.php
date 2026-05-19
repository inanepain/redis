<?php

/**
 * Inane: Redis
 *
 * Wrapper around the php redis extension.
 *
 * $Id$
 * $Date$
 *
 * PHP version 8.5
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
 * Exception that represents error in the program logic. This kind of exception should lead directly to a fix in your code.
 *
 * @implements \Inane\Exception\ExceptionInterface
 * @version 0.2.0
 */
class LogicException extends Exception implements ExceptionInterface {
}
