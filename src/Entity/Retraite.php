<?php

namespace App\Entity;

use App\Repository\RetraiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RetraiteRepository::class)]
class Retraite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'retraites')]
    private ?Adresse $adresse = null;

    #[ORM\ManyToMany(targetEntity: PrestationMedical::class, inversedBy: 'retraites')]
    private Collection $prestations_medicales;

    public function __construct()
    {
        $this->prestations_medicales = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?Adresse
    {
        return $this->adresse;
    }

    public function setAdresse(?Adresse $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection<int, PrestationMedical>
     */
    public function getPrestationsMedicales(): Collection
    {
        return $this->prestations_medicales;
    }

    public function addPrestationsMedicale(PrestationMedical $prestationsMedicale): static
    {
        if (!$this->prestations_medicales->contains($prestationsMedicale)) {
            $this->prestations_medicales->add($prestationsMedicale);
        }

        return $this;
    }

    public function removePrestationsMedicale(PrestationMedical $prestationsMedicale): static
    {
        $this->prestations_medicales->removeElement($prestationsMedicale);

        return $this;
    }
}
