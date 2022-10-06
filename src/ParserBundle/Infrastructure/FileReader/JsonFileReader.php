<?php

namespace App\ParserBundle\Infrastructure\FileReader;

use App\ParserBundle\Domain\Exception\DomainException;
use App\ParserBundle\Domain\MemeImageCollection;
use App\ParserBundle\Domain\ValueObject\ContentInterface;
use App\ParserBundle\Domain\ValueObject\JsonContent;
use App\ParserBundle\Infrastructure\FileUploader\UploadedExportFile;
use App\ParserBundle\Infrastructure\Shared\Filesystem\FilesystemManager;
use JsonException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class JsonFileReader implements FileReaderInterface
{
    protected FilesystemManager $filesystem;

    public function __construct(FilesystemManager $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function getContent(UploadedExportFile $uploadedFile): ContentInterface
    {
        return new JsonContent($uploadedFile->getContent());
    }

    public function canReadFile(UploadedExportFile $uploadedFile): bool
    {
        return $uploadedFile->getMimeType() === 'application/json';
    }
}
