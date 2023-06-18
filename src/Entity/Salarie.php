<?php

namespace App\Entity;

use App\Repository\SalarieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SalarieRepository::class)]
class Salarie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'salaries')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Entreprise $entreprise = null;

    #[ORM\ManyToOne(inversedBy: 'salaries')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Adresse $adresse = null;

    #[ORM\ManyToOne(inversedBy: 'salaries')]
    private ?Statut $statut = null;

    #[ORM\OneToMany(mappedBy: 'salarie', targetEntity: Salaire::class)]
    private Collection $salaires;

    #[ORM\OneToMany(mappedBy: 'salarie', targetEntity: PrestationMedical::class)]
    private Collection $prestationMedicales;

    public function __construct()
    {
        $this->salaires = new ArrayCollection();
        $this->prestationMedicales = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise): static
    {
        $this->entreprise = $entreprise;

        return $this;
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

    public function getStatut(): ?Statut
    {
        return $this->statut;
    }

    public function setStatut(?Statut $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * @return Collection<int, Salaire>
     */
    public function getSalaires(): Collection
    {
        return $this->salaires;
    }

    public function addSalaire(Salaire $salaire): static
    {
        if (!$this->salaires->contains($salaire)) {
            $this->salaires->add($salaire);
            $salaire->setSalarie($this);
        }

        return $this;
    }

    public function removeSalaire(Salaire $salaire): static
    {
        if ($this->salaires->removeElement($salaire)) {
            // set the owning side to null (unless already changed)
            if ($salaire->getSalarie() === $this) {
                $salaire->setSalarie(null);
            }
        }

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
            $prestationMedicale->setSalarie($this);
        }

        return $this;
    }

    public function removePrestationMedicale(PrestationMedical $prestationMedicale): static
    {
        if ($this->prestationMedicales->removeElement($prestationMedicale)) {
            // set the owning side to null (unless already changed)
            if ($prestationMedicale->getSalarie() === $this) {
                $prestationMedicale->setSalarie(null);
            }
        }

        return $this;
    }
}
