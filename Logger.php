<?php

declare(strict_types=1);

require './vendor/autoload.php';

class Logger
{
    private static $instance = null;

    public static function get()
    {
        if (self::$instance == null) {
            self::$instance = new Logger();
        }

        return self::$instance;
    }

    public function logError($message)
    {
        $logFile = fopen('application.log', 'w');
        fwrite($logFile, 'ERROR: ' . $message);
        fclose($logFile);
    }

    public function logSuccess($msg)
    {
        $logFile = fopen('application.log', 'a');
        fwrite($logFile, 'SUCCESS: ' . $msg);
    }
}
