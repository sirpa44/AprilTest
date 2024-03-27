<?php

namespace App\Entity;

use App\Repository\ProspectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProspectRepository::class)]
class Prospect
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $phone = null;

    // relation OneToMany on ProspectUpdate Entity
    #[ORM\OneToMany(targetEntity: ProspectUpdate::class, mappedBy: 'prospect', orphanRemoval: true)]
    private Collection $prospectUpdates;

    public function __construct()
    {
        $this->prospectUpdates = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return Collection<int, ProspectUpdate>
     */
    public function getProspectUpdates(): Collection
    {
        return $this->prospectUpdates;
    }

    public function addProspectUpdate(ProspectUpdate $prospectUpdate): static
    {
        if (!$this->prospectUpdates->contains($prospectUpdate)) {
            $this->prospectUpdates->add($prospectUpdate);
            $prospectUpdate->setProspect($this);
        }

        return $this;
    }

    public function removeProspectUpdate(ProspectUpdate $prospectUpdate): static
    {
        if ($this->prospectUpdates->removeElement($prospectUpdate)) {
            // set the owning side to null (unless already changed)
            if ($prospectUpdate->getProspect() === $this) {
                $prospectUpdate->setProspect(null);
            }
        }

        return $this;
    }
}
