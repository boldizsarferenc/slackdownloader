<?php

namespace App\ParserBundle\Infrastructure\FileReader;

use App\ParserBundle\Domain\ValueObject\Content;
use App\ParserBundle\Domain\ValueObject\ContentCollection;
use App\ParserBundle\Infrastructure\FileUploader\UploadedExportFile;

class ZipFileReader extends JsonFileReader
{
    public function getContents(UploadedExportFile $uploadedFile): ContentCollection
    {
        $dir = $this->filesystem->unZip($uploadedFile);
        $files = $this->filesystem->listFiles($dir, "*.json");
        $contents = [];
        foreach ($files as $file) {
            $contents[] = new Content($file->getContent());
        }
        return new ContentCollection(...$contents);
    }

    public function canReadFile(UploadedExportFile $uploadedFile): bool
    {
        return $uploadedFile->getMimeType() === 'application/zip';
    }
}
