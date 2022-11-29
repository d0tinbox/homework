<?php

declare(strict_types=1);

namespace Homework\Logger;

/**
 * Handler types.
 */
enum Type
{
    case FILE;
    case CONSOLE;
}
