<?php

namespace App\ParserBundle\Infrastructure\FileReader;

use App\ParserBundle\Domain\ValueObject\ContentCollection;
use App\ParserBundle\Infrastructure\FileUploader\UploadedExportFile;

interface FileReaderInterface
{
    public function canReadFile(UploadedExportFile $uploadedFile): bool;

    /**
     * @param UploadedExportFile $uploadedFile
     * @return ContentCollection
     */
    public function getContents(UploadedExportFile $uploadedFile): ContentCollection;
}
