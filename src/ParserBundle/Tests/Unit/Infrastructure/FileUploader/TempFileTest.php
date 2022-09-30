<?php

namespace App\ParserBundle\Tests\Unit\Infrastructure\FileUploader;

use App\ParserBundle\Domain\Exception\DomainException;
use App\ParserBundle\Infrastructure\FileUploader\TempFile;
use PHPUnit\Framework\TestCase;

class TempFileTest extends TestCase
{
    /**
     * @throws DomainException
     */
    public function testGetName(): void
    {
        $file = new TempFile(__DIR__ . '/test.json');
        $this->assertEquals('test.json', $file->getName());
    }
}
