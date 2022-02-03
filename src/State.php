<?php

declare(strict_types=1);

namespace Inane\Redis;

enum State {
    case CLOSED;
    case OPEN;
}
