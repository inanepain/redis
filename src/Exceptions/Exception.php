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

use Exception as SystemException;
use Throwable;

/**
 * Exception
 *
 * @version 0.3.0
 */
class Exception extends SystemException implements ExceptionInterface {
    /**
     * Custom construct template
     *
     * @param string $message error description
     * @param int $code unique identifier
     * @param \Throwable|null $previous error if any
     *
     * @return void
     */
    // public function __construct($message = '', $code = 0, Throwable $previous = null) {
    //     // some code

    //     // make sure everything is assigned properly, call parent construct
    //     parent::__construct($message, $code, $previous);
    // }

    /**
     * toString
     *
     * @return string error as string
     */
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    /**
     * Dump exception
     *
     * Uses Dumper to log exception
     *
     * @return void
     *
     * @throws \ReflectionException
     */
    public function dump(): void {
        echo time() . PHP_EOL;
        var_export([$this->code, $this->message]);
        echo PHP_EOL . '===========================' . PHP_EOL;
    }
}
