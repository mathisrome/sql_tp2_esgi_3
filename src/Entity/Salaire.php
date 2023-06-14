<?php

namespace App\Entity;

use App\Repository\SalaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SalaireRepository::class)]
class Salaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $salaire_brut = null;

    #[ORM\ManyToOne(inversedBy: 'salaires')]
    private ?Entreprise $entreprise = null;

    #[ORM\ManyToOne(inversedBy: 'salaires')]
    private ?Salarie $salarie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSalaireBrut(): ?int
    {
        return $this->salaire_brut;
    }

    public function setSalaireBrut(int $salaire_brut): static
    {
        $this->salaire_brut = $salaire_brut;

        return $this;
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
