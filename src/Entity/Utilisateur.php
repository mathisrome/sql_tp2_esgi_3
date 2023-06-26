<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\InheritanceType;

#[InheritanceType('JOINED')]
#[DiscriminatorColumn(name: 'discr', type: 'string')]
#[DiscriminatorMap(['utilisateur' => Utilisateur::class, 'retraite' => Retraite::class, 'salarie' => Salarie::class])]
#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'utilisateurs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Adresse $adresse = null;

    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: PrestationMedicale::class)]
    private Collection $prestation_medicales;

    public function __construct()
    {
        $this->prestation_medicales = new ArrayCollection();
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
     * @return Collection<int, PrestationMedicale>
     */
    public function getPrestationMedicales(): Collection
    {
        return $this->prestation_medicales;
    }

    public function addPrestationMedicale(PrestationMedicale $prestationMedicale): static
    {
        if (!$this->prestation_medicales->contains($prestationMedicale)) {
            $this->prestation_medicales->add($prestationMedicale);
            $prestationMedicale->setUtilisateur($this);
        }

        return $this;
    }

    public function removePrestationMedicale(PrestationMedicale $prestationMedicale): static
    {
        if ($this->prestation_medicales->removeElement($prestationMedicale)) {
            // set the owning side to null (unless already changed)
            if ($prestationMedicale->getUtilisateur() === $this) {
                $prestationMedicale->setUtilisateur(null);
            }
        }

        return $this;
    }
}
