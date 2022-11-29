<?php

declare(strict_types=1);

namespace Homework\Logger;

use Exception;

class FileHandler extends AbstractHandler implements HandlerInterface
{
    private string $LOG_FILE;

    public function __construct()
    {
        $this->LOG_FILE = __DIR__ . '/../application.log';
    }

    public function log(Status $type, string $message): bool
    {
        if (!$this->createFile()) {
            return false;
        }

        if (trim($message) === '') {
            return false;
        }

        $file = fopen($this->LOG_FILE, 'a');

        fwrite($file, sprintf("%s: %s\n", $type->getLabel(), $message));

        return fclose($file);
    }

    private function fileExists(): bool
    {
        return file_exists($this->LOG_FILE) && is_file($this->LOG_FILE) && is_writable($this->LOG_FILE);
    }

    private function createFile(): bool
    {
        if (!$this->fileExists() && !fopen($this->LOG_FILE, 'c')) {
            throw new Exception('Cannot create file');
        }

        return $this->fileExists();
    }
}
