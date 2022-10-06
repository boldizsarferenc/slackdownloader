<?php

namespace App\ParserBundle\Infrastructure\FileReader;

use App\ParserBundle\Domain\ValueObject\ContentInterface;
use App\ParserBundle\Infrastructure\FileUploader\UploadedExportFile;
use RuntimeException;

class ExtensionAwareFileReader implements FileReaderInterface
{
    /**
     * @var FileReaderInterface[]
     */
    private array $readers;

    public function addReader($reader): void
    {
        $this->readers[] = $reader;
    }

    public function getContent(UploadedExportFile $uploadedFile): ContentInterface
    {
        foreach ($this->readers as $reader) {
            if ($reader->canReadFile($uploadedFile)) {
                return $reader->getContent($uploadedFile);
            }
        }
        throw new RuntimeException('Missing reader for file: ' . $uploadedFile->getName());
    }

    public function canReadFile(UploadedExportFile $uploadedFile): bool
    {
        foreach ($this->readers as $reader) {
            if ($reader->canReadFile($uploadedFile)) {
                return true;
            }
        }
        return false;
    }
}
