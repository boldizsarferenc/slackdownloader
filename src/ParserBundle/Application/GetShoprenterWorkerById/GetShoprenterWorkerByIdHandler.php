<?php

namespace App\ParserBundle\Application\GetShoprenterWorkerById;

use App\ParserBundle\Application\Exception\ApplicationException;
use App\ParserBundle\Domain\Exception\DomainException;
use App\ParserBundle\Domain\ShoprenterWorker;
use App\ParserBundle\Domain\ShoprenterWorkerRepositoryInterface;

class GetShoprenterWorkerByIdHandler
{
    private ShoprenterWorkerRepositoryInterface $workerRepository;

    public function __construct(ShoprenterWorkerRepositoryInterface $workerRepository)
    {
        $this->workerRepository = $workerRepository;
    }

    /**
     * @throws ApplicationException
     */
    public function __invoke(GetShoprenterWorkerByIdQuery $query): ShoprenterWorker
    {
        try {
            return $this->workerRepository->getById($query->getId());
        } catch (DomainException $e) {
            throw new ApplicationException($e->getMessage(), $e->getCode());
        }
    }
}
