<?php

declare(strict_types=1);

namespace Homework\Logger;

/**
 * Abstract class for handlers.
 */
abstract class AbstractHandler
{
    public function logError(string $message): void
    {
        $this->log(Status::ERROR, $message);
    }

    public function logSuccess(string $message): void
    {
        $this->log(Status::SUCCESS, $message);
    }
}
