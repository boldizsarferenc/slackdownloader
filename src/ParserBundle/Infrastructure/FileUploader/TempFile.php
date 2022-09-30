<?php

namespace App\ParserBundle\Infrastructure\FileUploader;

use App\ParserBundle\Domain\Exception\DomainException;
use function end;
use function explode;
use const DIRECTORY_SEPARATOR;

class TempFile
{
    private string $path;
    private string $name;

    /**
     * @throws DomainException
     */
    public function __construct($path)
    {
        $this->path = $path;
        $this->name = $this->getFileNameFromPath($path);
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @throws DomainException
     */
    private function getFileNameFromPath($path): string
    {
        $explodedPath = explode(DIRECTORY_SEPARATOR, $path);
        $name = end($explodedPath);

        if (!$name) {
            throw new DomainException($path . ' is not a file');
        }

        return $name;
    }
}
