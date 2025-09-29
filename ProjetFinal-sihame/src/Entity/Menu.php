<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $plat = null;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlat(): ?string
    {
        return $this->plat;
    }

    public function setPlat(?string $plat): static
    {
        $this->plat = $plat;

        return $this;
    }

    
}
