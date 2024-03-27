<?php

namespace App\Event;

use App\Entity\Prospect;
use App\Entity\User;
use DateTimeImmutable;
use Symfony\Contracts\EventDispatcher\Event;

class ProspectUpdatedEvent extends Event
{
    private DateTimeImmutable $dateTimeImmutable;

    Public function __construct(
        private User $user,
        private Prospect $prospect,
    )
    {
        $this->dateTimeImmutable = new DateTimeImmutable();
    }

    public function getDateTimeImmutable(): DateTimeImmutable
    {
        return $this->dateTimeImmutable;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getProspect(): Prospect
    {
        return $this->prospect;
    }
}
