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

namespace Inane\Redis;

/**
 * Value Types
 *
 * @version 1.0.0
 * @package Inane\Redis
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
