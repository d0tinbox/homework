<?php

declare(strict_types=1);

namespace Homework\Logger;

/**
 * Console logger handler.
 */
class ConsoleHandler extends AbstractHandler implements HandlerInterface
{
    use ValidationTrait;

    /**
     * Add log entity to console.
     *
     * @param Status $type
     * @param string $message
     *
     * @return boolean
     */
    public function log(Status $type, string $message): bool
    {
        if (!$this->validate($message)) {
            return false;
        }

        $file = fopen('php://stdout', 'a');

        fwrite($file, sprintf("%s: %s\n", $type->getLabel(), $message));

        return fclose($file);
    }
}
