<?php

declare(strict_types=1);

namespace Homework\Logger;

/**
 * Handler factory.
 */
class HandlerFactory
{
    /**
     * Get handler instance.
     *
     * @param Type $type
     *
     * @return AbstractHandler
     */
    public static function get(Type $type = Type::FILE): AbstractHandler
    {
        return match ($type) {
            Type::FILE => new FileHandler(),
            Type::CONSOLE => new ConsoleHandler()
        };
    }
}
