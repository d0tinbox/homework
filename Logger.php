<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Homework\Logger\AbstractHandler;
use Homework\Logger\HandlerFactory;
use Homework\Logger\Type;

class Logger
{
    private static $instance = null;

    public static function get(): AbstractHandler
    {
        if (self::$instance == null) {
            self::$instance = HandlerFactory::get(self::getHandlerType());
        }

        return self::$instance;
    }

    /**
     * Get handler type.
     *
     * @return Type
     */
    private static function getHandlerType(): Type
    {
        if (count($_SERVER['argv']) > 1) {
            if ($_SERVER['argv'][1] === '-c' || $_SERVER['argv'][1] === '--console') {
                return Type::CONSOLE;
            }
        }

        return Type::FILE;
    }
}
