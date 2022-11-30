<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Homework\Logger\ValidationTrait;

class ValidationTraitTest extends TestCase
{
    private $validationTrait;

    protected function setUp(): void
    {
        parent::setUp();

        $this->validationTrait = $this->getMockForTrait(ValidationTrait::class);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->validationTrait);
    }

    /**
     * @dataProvider validationProvider
     */
    public function testValidate($message, $result): void
    {
        $this->assertSame($this->validationTrait->validate($message), $result);
    }

    public function validationProvider(): array
    {
        $data =  [
            ['test', true],
            ['🔰', true],
            ["\xd1", false], // Test broken UTF-8
            ['', false]
        ];

        return $data;
    }
}
