<?php

declare(strict_types=1);

namespace Inane\Redis\Types;

use Inane\Redis\Type;

/**
 * Redis Type Interface
 *
 * @version 0.1.0
 * @package Lab\Redis
 */
interface TypeInterface {
    /**
     * Get Type
     *
     * @return \Inane\Redis\Type Type
     */
    public function getType(): Type;

    /**
     * Variable exists
     *
     * @param string $key name
     *
     * @return bool exists
     */
    public function exists(): bool;
}
