<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../Logger.php';

use PHPUnit\Framework\TestCase;

class LoggerTest extends TestCase
{
    public function testGet(): void
    {
        $instance = \Logger::get();

        $this->assertInstanceOf('Homework\Logger\FileHandler', $instance);
        $this->assertInstanceOf('Homework\Logger\HandlerInterface', $instance);
        $this->assertInstanceOf('Homework\Logger\AbstractHandler', $instance);
    }
}
