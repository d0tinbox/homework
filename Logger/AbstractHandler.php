<?php

declare(strict_types=1);

namespace Homework\Logger;

/**
 * Abstract class for handlers.
 */
abstract class AbstractHandler
{
    /**
     * Add error entity to log.
     *
     * @param string $message
     *
     * @return boolean
     */
    public function logError(string $message): bool
    {
        return $this->log(Status::ERROR, $message);
    }

    /**
     * Add success entity to log.
     *
     * @param string $message
     *
     * @return boolean
     */
    public function logSuccess(string $message): bool
    {
        return $this->log(Status::SUCCESS, $message);
    }
}
