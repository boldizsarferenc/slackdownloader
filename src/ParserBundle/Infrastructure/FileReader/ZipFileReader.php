<?php

namespace App\ParserBundle\Infrastructure\FileReader;

use App\ParserBundle\Domain\ValueObject\ContentInterface;
use App\ParserBundle\Domain\ValueObject\JsonContent;
use App\ParserBundle\Infrastructure\FileUploader\UploadedExportFile;

class ZipFileReader extends JsonFileReader
{
    public function getContent(UploadedExportFile $uploadedFile): ContentInterface
    {
        $dir = $this->filesystem->unZip($uploadedFile);
        $files = $this->filesystem->listFiles($dir, "*.json");
        $content = new JsonContent('{}');
        foreach ($files as $file) {
            $content = $content->merge(new JsonContent($file->getContent()));
        }
        return $content;
    }

    public function canReadFile(UploadedExportFile $uploadedFile): bool
    {
        return $uploadedFile->getMimeType() === 'application/zip';
    }
}
