<?php

namespace App\ParserBundle\Infrastructure\FileReader;

use App\ParserBundle\Domain\MemeImageCollection;
use App\ParserBundle\Infrastructure\FileUploader\UploadedExportFile;
use RuntimeException;

class ExtensionAwareFileReader implements FileReaderInterface
{
    private array $readers;

    public function addReader($extension, $reader): void
    {
        $this->readers[$extension] = $reader;
    }

    public function getUrls(UploadedExportFile $file): MemeImageCollection
    {
        $extension = $file->getExtension();
        $reader = $this->readers[$extension] ?? null;
        if ($reader === null) {
            throw new RuntimeException('Missing reader for extension: ' . $extension);
        }
        return $reader->getUrls($file);
    }
}
