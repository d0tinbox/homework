<?php

declare(strict_types=1);

require './vendor/autoload.php';

use Homework\LoggerInterface;

class Logger implements LoggerInterface
{
    private static $instance = null;

    public static function get()
    {
        if (self::$instance == null) {
            self::$instance = new Logger();
        }

        return self::$instance;
    }

    public function logError(string $message): void
    {
        $logFile = fopen('application.log', 'w');
        fwrite($logFile, 'ERROR: ' . $message);
        fclose($logFile);
    }

    public function logSuccess(string $message): void
    {
        $logFile = fopen('application.log', 'a');
        fwrite($logFile, 'SUCCESS: ' . $message);
    }
}
