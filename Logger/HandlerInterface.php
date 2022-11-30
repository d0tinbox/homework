<?php

declare(strict_types=1);

namespace Homework\Logger;

/**
 * Interface for handlers.
 */
interface HandlerInterface
{
    /**
     * Add entity to log.
     *
     * @param Status $type
     * @param string $message
     *
     * @return boolean
     */
    public function log(Status $type, string $message): bool;
}
