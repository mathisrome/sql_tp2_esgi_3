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

    #[ORM\ManyToMany(targetEntity: PrestationMedical::class, inversedBy: 'salaries')]
    private Collection $prestations_medicales;

    public function __construct()
    {
        $this->salaires = new ArrayCollection();
        $this->prestations_medicales = new ArrayCollection();
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
