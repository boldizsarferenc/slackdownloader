<?php

namespace App\ParserBundle\Infrastructure\Shared\Filesystem;

use App\ParserBundle\Domain\Exception\DomainException;
use App\ParserBundle\Infrastructure\FileUploader\UploadedExportFile;

class FilesystemManager
{
    private FilesystemInterface $filesystem;

    public function __construct(FilesystemInterface $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function getContents(UploadedExportFile $file): string
    {
        $filesystemFile = new File($file->getPath());
        return $this->filesystem->getContents($filesystemFile);
    }

    /**
     * @return UploadedExportFile[]
     * @throws DomainException
     */
    public function listFiles(string $dir, string $pattern): array
    {
        $files = [];
        foreach ($this->filesystem->globRecursive($dir, $pattern) as $f) {
            /** @var File $f */
            $files[] = new UploadedExportFile($f->getPath(), $f->getName(), $f->getMimeType());
        }

        return $files;
    }

    public function unZip(UploadedExportFile $file): string
    {
        $filesystemFile = new File($file->getPath());
        return $this->filesystem->unZip($filesystemFile);
    }
}
