<?php

declare(strict_types=1);

namespace Homework\Logger;

class ConsoleHandler extends AbstractHandler implements HandlerInterface
{
    private string $LOG_FILE;

    public function __construct()
    {
        $this->LOG_FILE = 'php://stdout';
    }

    public function log(Status $type, string $message): bool
    {
        if (trim($message) === '') {
            return false;
        }

        $file = fopen($this->LOG_FILE, 'a');

        fwrite($file, sprintf("%s: %s\n", $type->getLabel(), $message));

        return fclose($file);
    }
}
