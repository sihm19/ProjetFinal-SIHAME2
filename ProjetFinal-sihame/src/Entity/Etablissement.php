<?php

namespace App\Entity;

use App\Enum\TypeEtablissement;
use App\Repository\EtablissementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtablissementRepository::class)]
class Etablissement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, enumType: TypeEtablissement::class)]
    private array $TypeEtablissement = [];

    #[ORM\ManyToOne(inversedBy: 'etablissements')]
    private ?Localisation $Localisation = null;

    #[ORM\Column(length: 500)]
    private ?string $Menu = null;

    /**
     * @var Collection<int, Menu>
     */
    #[ORM\OneToMany(targetEntity: Menu::class, mappedBy: 'etablissement')]
    private Collection $menus;

    /**
     * @var Collection<int, Table>
     */
    #[ORM\OneToMany(targetEntity: Table::class, mappedBy: 'etablissement')]
    private Collection $tables;

    public function __construct()
    {
        $this->menus = new ArrayCollection();
        $this->tables = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return TypeEtablissement[]
     */
    public function getTypeEtablissement(): array
    {
        return $this->TypeEtablissement;
    }

    public function setTypeEtablissement(array $TypeEtablissement): static
    {
        $this->TypeEtablissement = $TypeEtablissement;

        return $this;
    }

    public function getLocalisation(): ?Localisation
    {
        return $this->Localisation;
    }

    public function setLocalisation(?Localisation $Localisation): static
    {
        $this->Localisation = $Localisation;

        return $this;
    }

    /**
     * @return Collection<int, Menu>
     */
    public function getMenus(): Collection
    {
        return $this->menus;
    }

    public function addMenu(Menu $menu): static
    {
        if (!$this->menus->contains($menu)) {
            $this->menus->add($menu);
            $menu->setEtablissement($this);
        }

        return $this;
    }

    public function removeMenu(Menu $menu): static
    {
        if ($this->menus->removeElement($menu)) {
            // set the owning side to null (unless already changed)
            if ($menu->getEtablissement() === $this) {
                $menu->setEtablissement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Table>
     */
    public function getTables(): Collection
    {
        return $this->tables;
    }

    public function addTable(Table $table): static
    {
        if (!$this->tables->contains($table)) {
            $this->tables->add($table);
            $table->setEtablissement($this);
        }

        return $this;
    }

    public function removeTable(Table $table): static
    {
        if ($this->tables->removeElement($table)) {
            // set the owning side to null (unless already changed)
            if ($table->getEtablissement() === $this) {
                $table->setEtablissement(null);
            }
        }

        return $this;
    }

}
