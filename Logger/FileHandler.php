<?php

declare(strict_types=1);

namespace Homework\Logger;

use Exception;

/**
 * File logger handler.
 */
class FileHandler extends AbstractHandler implements HandlerInterface
{
    use ValidationTrait;

    /**
     * Path to log file.
     *
     * @var string
     */
    private string $LOG_FILE;

    public function __construct()
    {
        $this->LOG_FILE = __DIR__ . '/../application.log';
    }

    /**
     * Add log entity to file.
     *
     * @param Status $type
     * @param string $message
     *
     * @return boolean
     */
    public function log(Status $type, string $message): bool
    {
        if (!$this->createFile()) {
            return false;
        }

        if (!$this->validate($message)) {
            return false;
        }

        $file = fopen($this->LOG_FILE, 'a');

        fwrite($file, sprintf("%s: %s\n", $type->getLabel(), $message));

        return fclose($file);
    }

    /**
     * Check if file exists or not.
     *
     * @return boolean
     */
    private function fileExists(): bool
    {
        return file_exists($this->LOG_FILE) && is_file($this->LOG_FILE) && is_writable($this->LOG_FILE);
    }

    /**
     * Create file if not exists.
     *
     * @return boolean
     */
    private function createFile(): bool
    {
        if (!$this->fileExists() && !fopen($this->LOG_FILE, 'c')) {
            throw new Exception('Cannot create file');
        }

        return $this->fileExists();
    }
}
