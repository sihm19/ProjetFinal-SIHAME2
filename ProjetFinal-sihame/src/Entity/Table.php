<?php

namespace App\Entity;

use App\Repository\TableRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TableRepository::class)]
#[ORM\Table(name: '`table`')]
class Table
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $NbDePlace = null;

    #[ORM\Column]
    private ?bool $EstReserve = null;

    #[ORM\Column]
    private ?int $NombreTable = null;

    #[ORM\ManyToOne(inversedBy: 'tables')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Etablissement $etablissement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbDePlace(): ?int
    {
        return $this->NbDePlace;
    }

    public function setNbDePlace(int $NbDePlace): static
    {
        $this->NbDePlace = $NbDePlace;

        return $this;
    }

    public function isEstReserve(): ?bool
    {
        return $this->EstReserve;
    }

    public function setEstReserve(bool $EstReserve): static
    {
        $this->EstReserve = $EstReserve;

        return $this;
    }

    public function getNombreTable(): ?int
    {
        return $this->NombreTable;
    }

    public function setNombreTable(int $NombreTable): static
    {
        $this->NombreTable = $NombreTable;

        return $this;
    }

    public function getEtablissement(): ?Etablissement
    {
        return $this->etablissement;
    }

    public function setEtablissement(?Etablissement $etablissement): static
    {
        $this->etablissement = $etablissement;

        return $this;
    }
}
