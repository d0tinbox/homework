<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Homework\Logger\FileHandler;
use Homework\Logger\Status;

class FileHandlerTest extends TestCase
{
    private const FILE_PATH = __DIR__ . '/../application.log';

    private FileHandler $fileHandler;
    private string $fileContent;

    protected function setUp(): void
    {
        parent::setUp();

        $this->fileHandler = new FileHandler();
        $this->fileContent = file_get_contents(self::FILE_PATH);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->fileHandler);
        unset($this->fileContent);
    }

    public function testLogSuccess(): void
    {
        $this->assertTrue($this->fileHandler->log(Status::SUCCESS, 'Test success'));
        $this->assertStringEqualsFile(self::FILE_PATH, $this->fileContent . "Success: Test success\n");
    }

    public function testLogError(): void
    {
        $this->assertTrue($this->fileHandler->log(Status::ERROR, 'Test error'));
        $this->assertStringEqualsFile(self::FILE_PATH, $this->fileContent . "Error: Test error\n");
    }

    public function testLogWithEmptyMessage(): void
    {
        $this->assertFalse($this->fileHandler->log(Status::SUCCESS, ''));
        $this->assertStringEqualsFile(self::FILE_PATH, $this->fileContent);
    }

    public function testLogFileWritable(): void
    {
        $this->assertFileIsWritable(self::FILE_PATH);
    }
}
