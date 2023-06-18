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

    #[ORM\ManyToOne(inversedBy: 'prestationMedicales')]
    private ?Retraite $retraite = null;

    #[ORM\ManyToOne(inversedBy: 'prestationMedicales')]
    private ?Salarie $salarie = null;

    public function __construct()
    {
        $this->prestationMedicales = new ArrayCollection();
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

    public function getRetraite(): ?Retraite
    {
        return $this->retraite;
    }

    public function setRetraite(?Retraite $retraite): static
    {
        $this->retraite = $retraite;

        return $this;
    }

    public function getSalarie(): ?Salarie
    {
        return $this->salarie;
    }

    public function setSalarie(?Salarie $salarie): static
    {
        $this->salarie = $salarie;

        return $this;
    }
}
