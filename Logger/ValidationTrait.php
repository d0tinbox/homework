<?php

declare(strict_types=1);

namespace Homework\Logger;

/**
 * Validation trait
 */
trait ValidationTrait
{
    /**
     * Validate log message.
     *
     * @param string $message
     *
     * @return boolean
     */
    public function validate(string $message): bool
    {
        if (!is_string($message)) {
            return false;
        }

        if (mb_check_encoding($message, 'UTF-8') !== true) {
            return false;
        }

        if (trim($message) === '') {
            return false;
        }

        return true;
    }
}
