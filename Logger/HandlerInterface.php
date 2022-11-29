<?php

declare(strict_types=1);

namespace Homework\Logger;

/**
 * Interface for handlers.
 */
interface HandlerInterface
{
    public function log(Status $type, string $message): bool;
}
