<?php

namespace App\RemoteUserBundle\Infrastructure\Event\Messenger;

use App\RemoteUserBundle\Domain\Event\DomainEventDispatcherInterface;
use App\RemoteUserBundle\Domain\Event\UserActivitiesEventInterface;
use App\Shared\Infrastructure\Event\ContextTransferEvent;
use Symfony\Component\Messenger\MessageBusInterface;

use function get_class;

class DomainEventDispatcherAdapter implements DomainEventDispatcherInterface
{
    private MessageBusInterface $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;
    }

    public function dispatchUserActivityEvent(UserActivitiesEventInterface $event): void
    {
        $this->bus->dispatch(new ContextTransferEvent(
            get_class($event),
            $event->getHappenedAt(),
            [
                'userId' => $event->getUserId()
            ]
        ));
    }
}