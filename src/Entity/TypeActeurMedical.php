<?php

namespace App\Entity;

use App\Repository\TypeActeurMedicalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeActeurMedicalRepository::class)]
class TypeActeurMedical
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'type_acteur_medical', targetEntity: ActeMedical::class)]
    private Collection $acteMedicals;

    public function __construct()
    {
        $this->acteMedicals = new ArrayCollection();
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
     * @return Collection<int, ActeMedical>
     */
    public function getActeMedicals(): Collection
    {
        return $this->acteMedicals;
    }

    public function addActeMedical(ActeMedical $acteMedical): static
    {
        if (!$this->acteMedicals->contains($acteMedical)) {
            $this->acteMedicals->add($acteMedical);
            $acteMedical->setTypeActeurMedical($this);
        }

        return $this;
    }

    public function removeActeMedical(ActeMedical $acteMedical): static
    {
        if ($this->acteMedicals->removeElement($acteMedical)) {
            // set the owning side to null (unless already changed)
            if ($acteMedical->getTypeActeurMedical() === $this) {
                $acteMedical->setTypeActeurMedical(null);
            }
        }

        return $this;
    }
}
