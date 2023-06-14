<?php

namespace App\Entity;

use App\Repository\PrestationMedicalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrestationMedicalRepository::class)]
class PrestationMedical
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'prestationMedicals')]
    private ?ActeMedical $acte_medical = null;

    #[ORM\ManyToMany(targetEntity: Retraite::class, mappedBy: 'prestations_medicales')]
    private Collection $retraites;

    #[ORM\ManyToMany(targetEntity: Salarie::class, mappedBy: 'prestations_medicales')]
    private Collection $salaries;

    public function __construct()
    {
        $this->retraites = new ArrayCollection();
        $this->salaries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActeMedical(): ?ActeMedical
    {
        return $this->acte_medical;
    }

    public function setActeMedical(?ActeMedical $acte_medical): static
    {
        $this->acte_medical = $acte_medical;

        return $this;
    }

    /**
     * @return Collection<int, Retraite>
     */
    public function getRetraites(): Collection
    {
        return $this->retraites;
    }

    public function addRetraite(Retraite $retraite): static
    {
        if (!$this->retraites->contains($retraite)) {
            $this->retraites->add($retraite);
            $retraite->addPrestationsMedicale($this);
        }

        return $this;
    }

    public function removeRetraite(Retraite $retraite): static
    {
        if ($this->retraites->removeElement($retraite)) {
            $retraite->removePrestationsMedicale($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Salarie>
     */
    public function getSalaries(): Collection
    {
        return $this->salaries;
    }

    public function addSalary(Salarie $salary): static
    {
        if (!$this->salaries->contains($salary)) {
            $this->salaries->add($salary);
            $salary->addPrestationsMedicale($this);
        }

        return $this;
    }

    public function removeSalary(Salarie $salary): static
    {
        if ($this->salaries->removeElement($salary)) {
            $salary->removePrestationsMedicale($this);
        }

        return $this;
    }
}
