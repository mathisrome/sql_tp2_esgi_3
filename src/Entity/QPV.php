<?php

namespace App\Entity;

use App\Repository\QPVRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QPVRepository::class)]
class QPV
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToMany(targetEntity: Geocalisation::class, mappedBy: 'QPV')]
    private Collection $geocalisations;

    public function __construct()
    {
        $this->geocalisations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Geocalisation>
     */
    public function getGeocalisations(): Collection
    {
        return $this->geocalisations;
    }

    public function addGeocalisation(Geocalisation $geocalisation): static
    {
        if (!$this->geocalisations->contains($geocalisation)) {
            $this->geocalisations->add($geocalisation);
            $geocalisation->addQPV($this);
        }

        return $this;
    }

    public function removeGeocalisation(Geocalisation $geocalisation): static
    {
        if ($this->geocalisations->removeElement($geocalisation)) {
            $geocalisation->removeQPV($this);
        }

        return $this;
    }
}
