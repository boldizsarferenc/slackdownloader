<?php

namespace App\ParserBundle\Application\GetImages;

use App\ParserBundle\Application\Exception\ApplicationException;
use App\ParserBundle\Domain\Event\DomainEventDispatcherInterface;
use App\ParserBundle\Domain\Event\UserParsedImagesEvent;
use App\ParserBundle\Domain\Exception\DomainException;
use App\ParserBundle\Domain\MemeImageCollection;
use App\ParserBundle\Domain\MemeImageParserInterface;
use App\ParserBundle\Domain\ShoprenterWorkerRepositoryInterface;
use DateTimeImmutable;

class GetImagesHandler
{
    private MemeImageParserInterface $parser;
    private DomainEventDispatcherInterface $dispatcher;
    private ShoprenterWorkerRepositoryInterface $workerRepository;

    public function __construct(
        MemeImageParserInterface $parser,
        DomainEventDispatcherInterface $dispatcher,
        ShoprenterWorkerRepositoryInterface $workerRepository
    ) {
        $this->parser = $parser;
        $this->dispatcher = $dispatcher;
        $this->workerRepository = $workerRepository;
    }

    /**
     * @throws ApplicationException
     */
    public function __invoke(GetImagesQuery $query): MemeImageCollection
    {
        try {
            $worker = $this->workerRepository->getById($query->getWorkerId());
            $collection = $this->parser->getMemeImages($query->getContents());
        } catch (DomainException $e) {
            throw new ApplicationException($e->getMessage(), $e->getCode());
        }

        $this->dispatcher->dispatchUserActivityEvent(
            new UserParsedImagesEvent(
                $worker->getId(),
                new DateTimeImmutable(),
            )
        );

        return $collection;
    }
}
