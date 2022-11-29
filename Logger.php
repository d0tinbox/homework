<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Homework\Logger\HandlerInterface;
use Homework\Logger\LoggerInterface;
use Homework\Logger\AbstractHandler;
use Homework\Logger\FileHandler;

class Logger implements LoggerInterface
{
    private static $instance = null;

    public static function get(): HandlerInterface
    {
        if (self::$instance == null) {
            self::$instance = new FileHandler();
        }

        return self::$instance;
    }

    public function logError(string $message): void
    {
        self::$instance->logError($message);
    }

    public function logSuccess(string $message): void
    {
        self::$instance->logSuccess($message);
    }
}
