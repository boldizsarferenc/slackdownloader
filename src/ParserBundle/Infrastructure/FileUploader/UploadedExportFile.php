<?php

namespace App\ParserBundle\Infrastructure\FileUploader;

use App\ParserBundle\Domain\Exception\DomainException;
use function end;
use function explode;

class UploadedExportFile
{
    private string $path;
    private string $name;
    private string $mimeType;

    /**
     * @throws DomainException
     */
    public function __construct(string $path, string $name, string $mimeType)
    {
        $this->path = $path;
        $this->name = $name;
        $this->mimeType = $mimeType;

        if (!in_array($this->mimeType, ['application/zip', 'application/json'])) {
            throw new DomainException('wrong file format');
        }
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getContent(): string
    {
        return file_get_contents($this->path);
    }

    public function getMimeType(): string
    {
        return $this->mimeType;
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

    private function getExtensionFromFilename($filename): string
    {
        $explodedFileName = explode('.', $filename);
        return end($explodedFileName);
    }
}
