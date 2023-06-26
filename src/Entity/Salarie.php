<?php

namespace App\Entity;

use App\Repository\SalarieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SalarieRepository::class)]
class Salarie extends Utilisateur
{
    #[ORM\ManyToOne(inversedBy: 'salaries')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Entreprise $entreprise = null;

    #[ORM\ManyToOne(inversedBy: 'salaries')]
    private ?Statut $statut = null;

    #[ORM\OneToMany(mappedBy: 'salarie', targetEntity: Salaire::class)]
    private Collection $salaires;

    public function __construct()
    {
        $this->salaires = new ArrayCollection();
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
}
