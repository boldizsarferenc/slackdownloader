<?php

namespace App\ParserBundle\Presentation\Api\Controller;

use App\ParserBundle\Application\AuthenticateShoprenterWorker\AuthenticateShoprenterWorkerQuery;
use App\ParserBundle\Application\GetImages\GetImagesQuery;
use App\ParserBundle\Domain\ValueObject\JsonContent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use Throwable;

class ParseImagesController extends AbstractController
{
    use HandleTrait;

    public function __construct(MessageBusInterface $queryBus)
    {
        $this->messageBus = $queryBus;
    }

    public function postAction(Request $request)
    {
        try {
            $worker = $this->handle(
                new AuthenticateShoprenterWorkerQuery(
                    $request->headers->get('username'),
                    $request->headers->get('password')
                )
            );
        } catch (Throwable $throwable) {
            return new JsonResponse(['error' => 'Unauthorized'], 401);
        }

        if ($request->get('Content-Type') === 'application/json') {
            return new JsonResponse(['error' => 'Json Required'], 400);
        }

        try {
            $urls = $this->handle(
                new GetImagesQuery(
                    new JsonContent($request->getContent()),
                    $worker->getId()
                )
            );
        } catch (Throwable $throwable) {
            return new JsonResponse(['error' => 'Internal Server Error'], 500);
        }

        return new JsonResponse($urls, 200);
    }
}
