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

    #[ORM\OneToMany(mappedBy: 'retraite', targetEntity: PrestationMedical::class)]
    private Collection $prestationMedicales;

    public function __construct()
    {
        $this->prestationMedicales = new ArrayCollection();
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
    public function getPrestationMedicales(): Collection
    {
        return $this->prestationMedicales;
    }

    public function addPrestationMedicale(PrestationMedical $prestationMedicale): static
    {
        if (!$this->prestationMedicales->contains($prestationMedicale)) {
            $this->prestationMedicales->add($prestationMedicale);
            $prestationMedicale->setRetraite($this);
        }

        return $this;
    }

    public function removePrestationMedicale(PrestationMedical $prestationMedicale): static
    {
        if ($this->prestationMedicales->removeElement($prestationMedicale)) {
            // set the owning side to null (unless already changed)
            if ($prestationMedicale->getRetraite() === $this) {
                $prestationMedicale->setRetraite(null);
            }
        }

        return $this;
    }
}
