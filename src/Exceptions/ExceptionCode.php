<?php
/**
 * Inane Redis
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP version 8
 *
 * @author Philip Michael Raab <philip@inane.co.za>
 * @package Inane\Exception
 *
 * @license MIT
 * @license https://inane.co.za/license/MIT
 *
 * @copyright 2015-2021 Philip Michael Raab <philip@inane.co.za>
 */
declare(strict_types=1);

namespace Inane\Redis\Exceptions;

use function preg_replace;

/**
 * Exception Codes
 *
 * @version 1.0.0
 * @package Inane\Redis
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
