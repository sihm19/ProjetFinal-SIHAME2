<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTime $Date = null;

    #[ORM\Column]
    private ?int $NombrePersonne = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTime
    {
        return $this->Date;
    }

    public function setDate(\DateTime $Date): static
    {
        $this->Date = $Date;

        return $this;
    }

    public function getNombrePersonne(): ?int
    {
        return $this->NombrePersonne;
    }

    public function setNombrePersonne(int $NombrePersonne): static
    {
        $this->NombrePersonne = $NombrePersonne;

        return $this;
    }
}
