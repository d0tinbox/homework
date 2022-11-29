<?php

declare(strict_types=1);

namespace Homework\Logger;

/**
 * Log entity status.
 */
enum Status
{
    case ERROR;
    case SUCCESS;

    /**
     * Get text label for status.
     *
     * @return string
     */
    public function getLabel(): string
    {
        return match ($this) {
            Status::ERROR => 'Error',
            Status::SUCCESS => 'Success'
        };
    }
}
