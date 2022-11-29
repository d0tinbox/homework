<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Homework\Logger\AbstractHandler;
use Homework\Logger\LoggerInterface;
use Homework\Logger\HandlerFactory;

class Logger implements LoggerInterface
{
    private static $instance = null;

    public static function get(): AbstractHandler
    {
        if (self::$instance == null) {
            self::$instance = HandlerFactory::get();
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
