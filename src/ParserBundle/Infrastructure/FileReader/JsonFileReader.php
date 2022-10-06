<?php

namespace App\ParserBundle\Infrastructure\FileReader;

use App\ParserBundle\Domain\ValueObject\Content;
use App\ParserBundle\Domain\ValueObject\ContentCollection;
use App\ParserBundle\Infrastructure\FileUploader\UploadedExportFile;
use App\ParserBundle\Infrastructure\Shared\Filesystem\FilesystemManager;

class JsonFileReader implements FileReaderInterface
{
    protected FilesystemManager $filesystem;

    public function __construct(FilesystemManager $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function getContents(UploadedExportFile $uploadedFile): ContentCollection
    {
        return new ContentCollection(new Content($uploadedFile->getContent()));
    }

    public function canReadFile(UploadedExportFile $uploadedFile): bool
    {
        return $uploadedFile->getMimeType() === 'application/json';
    }
}
