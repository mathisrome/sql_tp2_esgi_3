<?php

namespace App\Entity;

use App\Repository\ActeMedicalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActeMedicalRepository::class)]
class ActeMedical
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $cout = null;

    #[ORM\Column]
    private ?int $pourcentage_securite_social = null;

    #[ORM\ManyToOne(inversedBy: 'acteMedicals')]
    private ?TypeActeurMedical $type_acteur_medical = null;

    #[ORM\OneToMany(mappedBy: 'acte_medical', targetEntity: PrestationMedicale::class)]
    private Collection $prestationMedicals;

    public function __construct()
    {
        $this->prestationMedicals = new ArrayCollection();
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

    public function getCout(): ?int
    {
        return $this->cout;
    }

    public function setCout(int $cout): static
    {
        $this->cout = $cout;

        return $this;
    }

    public function getPourcentageSecuriteSocial(): ?int
    {
        return $this->pourcentage_securite_social;
    }

    public function setPourcentageSecuriteSocial(int $pourcentage_securite_social): static
    {
        $this->pourcentage_securite_social = $pourcentage_securite_social;

        return $this;
    }

    public function getTypeActeurMedical(): ?TypeActeurMedical
    {
        return $this->type_acteur_medical;
    }

    public function setTypeActeurMedical(?TypeActeurMedical $type_acteur_medical): static
    {
        $this->type_acteur_medical = $type_acteur_medical;

        return $this;
    }

    /**
     * @return Collection<int, PrestationMedicale>
     */
    public function getPrestationMedicals(): Collection
    {
        return $this->prestationMedicals;
    }

    public function addPrestationMedical(PrestationMedicale $prestationMedical): static
    {
        if (!$this->prestationMedicals->contains($prestationMedical)) {
            $this->prestationMedicals->add($prestationMedical);
            $prestationMedical->setActeMedical($this);
        }

        return $this;
    }

    public function removePrestationMedical(PrestationMedicale $prestationMedical): static
    {
        if ($this->prestationMedicals->removeElement($prestationMedical)) {
            // set the owning side to null (unless already changed)
            if ($prestationMedical->getActeMedical() === $this) {
                $prestationMedical->setActeMedical(null);
            }
        }

        return $this;
    }
}
