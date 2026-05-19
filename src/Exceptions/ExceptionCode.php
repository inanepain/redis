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

use function preg_replace;

/**
 * Exception Codes
 *
 * @version 1.0.0
 */
enum ExceptionCode: int {
    case MissingExtension = 100;
    case MethodStub       = 333;

    /**
     * Creates the error message prefix from exception name
     *
     * @return string error message prefix
     */
    protected function messageFromName(): string {
        return preg_replace('/(?<!\ )[A-Z]/', ' $0', $this->name);
    }

    /**
     * The value type for parameters or returns
     *
     * @return string
     */
    public function message(): string {
        return match ($this) {
            static::MethodStub => 'TODO: Complete method: ',
            default => "{$this->messageFromName()}:",
        };
    }
}
