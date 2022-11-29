<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Homework\Logger\AbstractHandler;
use Homework\Logger\HandlerFactory;

class Logger
{
    private static $instance = null;

    public static function get(): AbstractHandler
    {
        if (self::$instance == null) {
            self::$instance = HandlerFactory::get();
        }

        return self::$instance;
    }
}
