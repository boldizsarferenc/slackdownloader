<?php

namespace App\ParserBundle\Infrastructure\FileReader;

use App\ParserBundle\Domain\ValueObject\ContentInterface;
use App\ParserBundle\Infrastructure\FileUploader\UploadedExportFile;

interface FileReaderInterface
{
    public function canReadFile(UploadedExportFile $uploadedFile):bool;

    public function getContent(UploadedExportFile $uploadedFile): ContentInterface;
}
