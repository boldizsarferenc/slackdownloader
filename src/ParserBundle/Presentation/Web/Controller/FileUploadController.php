<?php

namespace App\ParserBundle\Presentation\Web\Controller;

use App\ParserBundle\Application\GetImages\GetImagesQuery;
use App\ParserBundle\Application\GetShoprenterWorkerById\GetShoprenterWorkerByIdQuery;
use App\ParserBundle\Domain\Exception\DomainException;
use App\ParserBundle\Domain\ShoprenterWorker;
use App\ParserBundle\Infrastructure\FileReader\FileReaderInterface;
use App\ParserBundle\Infrastructure\FileUploader\UploadedExportFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

class FileUploadController extends AbstractController
{
    use HandleTrait;

    private FileReaderInterface $fileReader;

    public function __construct(MessageBusInterface $queryBus, FileReaderInterface $fileReader)
    {
        $this->messageBus = $queryBus;
        $this->fileReader = $fileReader;
    }

    public function index(Session $session): Response
    {
        /** @var ShoprenterWorker $worker */
        $worker = $this->handle(new GetShoprenterWorkerByIdQuery($this->getUser()->getId()));

        $errors = $session->getFlashBag()->get('error', []);

        return $this->render('file_upload/index.html.twig', [
            'fullName' => $worker->getFullName(),
            'errors' => $errors
        ]);
    }

    /**
     * @throws DomainException
     */
    public function upload(Request $request): Response
    {
        /** @var UploadedFile $file */
        $file = $request->files->get('fileToUpload');

        /** @var ShoprenterWorker $worker */
        $worker = $this->handle(new GetShoprenterWorkerByIdQuery($this->getUser()->getId()));

        $uploadedExportFile = new UploadedExportFile($file->getRealPath(), $file->getFilename(), $file->getMimeType());
        $contents = $this->fileReader->getContents($uploadedExportFile);

        try {
            $urls = $this->handle(
                new GetImagesQuery(
                    $contents,
                    $worker->getId()
                )
            );
        } catch (HandlerFailedException $exception) {
            $this->addFlash('error', $exception->getPrevious()->getMessage());
            return $this->redirectToRoute('file_upload');
        }


        return $this->render('file_upload/list.html.twig', [
            'urls' => $urls
        ]);
    }
}
