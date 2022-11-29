<?php

declare(strict_types=1);

namespace Homework\Logger;

enum Status
{
    case ERROR;
    case SUCCESS;

    public function getLabel(): string
    {
        return match ($this) {
            Status::ERROR => 'Error',
            Status::SUCCESS => 'Success'
        };
    }
}
