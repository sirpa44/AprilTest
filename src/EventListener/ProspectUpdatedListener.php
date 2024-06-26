<?php

namespace App\EventListener;

use App\Entity\ProspectUpdate;
use App\Event\ProspectUpdatedEvent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

// once the ProspectUpdatedEvent is created the method onProspectUpdateis executed
#[AsEventListener(event: ProspectUpdatedEvent::class, method: 'onProspectUpdated')]
final class ProspectUpdatedListener
{
    public function __construct(
        private EntityManagerInterface $entityManager
    )
    {}

    // create a new ProspectUpdate with the User, the Prospect and a TimeStampImmutable
    public function onProspectUpdated(ProspectUpdatedEvent $event): void
    {
        $prospectUpdate = new ProspectUpdate();
        $prospectUpdate
            ->setUser($event->getUser())
            ->setProspect($event->getProspect())
            ->setDate($event->getDateTimeImmutable());

        $this->entityManager->persist($prospectUpdate);

        $this->entityManager->flush();
    }
}
