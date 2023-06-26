<?php

namespace App\Entity;

use App\Repository\PrestationMedicaleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrestationMedicaleRepository::class)]
class PrestationMedicale
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'prestationMedicals')]
    private ?ActeMedical $acte_medical = null;

    #[ORM\ManyToOne(inversedBy: 'prestation_medicales')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $utilisateur = null;

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

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
