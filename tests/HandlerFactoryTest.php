<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Homework\Logger\HandlerFactory;
use Homework\Logger\Type;

class HandlerFactoryTest extends TestCase
{
    public function testFileHandler(): void
    {
        $instance = HandlerFactory::get(Type::FILE);

        $this->assertInstanceOf('Homework\Logger\FileHandler', $instance);
        $this->assertInstanceOf('Homework\Logger\HandlerInterface', $instance);
        $this->assertInstanceOf('Homework\Logger\AbstractHandler', $instance);
    }

    public function testConsoleHandler(): void
    {
        $instance = HandlerFactory::get(Type::CONSOLE);

        $this->assertInstanceOf('Homework\Logger\ConsoleHandler', $instance);
        $this->assertInstanceOf('Homework\Logger\HandlerInterface', $instance);
        $this->assertInstanceOf('Homework\Logger\AbstractHandler', $instance);
    }
}
