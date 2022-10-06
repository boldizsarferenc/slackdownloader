<?php

namespace App\ParserBundle\Infrastructure\Shared\Filesystem;

class File
{
    private string $name;
    private string $path;
    private string $mimeType;

    public function __construct($path)
    {
        $this->name = basename($path);
        $this->path = $path;
        $this->mimeType = mime_content_type($path);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getMimeType(): string
    {
        return $this->mimeType;
    }
}
