<?php

declare(strict_types=1);

namespace Homework\Logger;

class HandlerFactory
{
    public static function get(Type $type = Type::FILE): AbstractHandler
    {
        return match ($type) {
            Type::FILE => new FileHandler(),
            Type::CONSOLE => new ConsoleHandler()
        };
    }
}
