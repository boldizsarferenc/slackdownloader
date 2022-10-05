<?php

namespace App\ParserBundle\Infrastructure\FileReader;

use App\ParserBundle\Domain\Exception\DomainException;
use App\ParserBundle\Domain\MemeImageCollection;
use App\ParserBundle\Infrastructure\FileUploader\UploadedExportFile;
use App\ParserBundle\Infrastructure\Shared\Filesystem\FilesystemManager;
use JsonException;

class JsonFileReader implements FileReaderInterface
{
    protected FilesystemManager $filesystem;

    public function __construct(FilesystemManager $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    /**
     * @throws DomainException|JsonException
     */
    public function getUrls(UploadedExportFile $uploadedExportFile): MemeImageCollection
    {
        $json = $this->filesystem->getContents($uploadedExportFile);
        $posts = json_decode($json, true, 512, JSON_THROW_ON_ERROR);

        return MemeImageCollection::createFromArray($posts);
    }
}
