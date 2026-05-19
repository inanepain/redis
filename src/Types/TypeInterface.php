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

namespace Inane\Redis\Types;

use Inane\Redis\Type;

/**
 * Redis Type Interface
 *
 * @version 0.1.0
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
