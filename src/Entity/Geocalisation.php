<?php

namespace App\Entity;

use App\Repository\GeocalisationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GeocalisationRepository::class)]
class Geocalisation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $latitude = null;

    #[ORM\Column]
    private ?float $longitude = null;

    #[ORM\OneToMany(mappedBy: 'geocalisation', targetEntity: Adresse::class)]
    private Collection $adresse;

    #[ORM\ManyToMany(targetEntity: QPV::class, inversedBy: 'geocalisations')]
    private Collection $QPV;

    public function __construct()
    {
        $this->adresse = new ArrayCollection();
        $this->QPV = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): static
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): static
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * @return Collection<int, Adresse>
     */
    public function getAdresse(): Collection
    {
        return $this->adresse;
    }

    public function addAdresse(Adresse $adresse): static
    {
        if (!$this->adresse->contains($adresse)) {
            $this->adresse->add($adresse);
            $adresse->setGeocalisation($this);
        }

        return $this;
    }

    public function removeAdresse(Adresse $adresse): static
    {
        if ($this->adresse->removeElement($adresse)) {
            // set the owning side to null (unless already changed)
            if ($adresse->getGeocalisation() === $this) {
                $adresse->setGeocalisation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, QPV>
     */
    public function getQPV(): Collection
    {
        return $this->QPV;
    }

    public function addQPV(QPV $qPV): static
    {
        if (!$this->QPV->contains($qPV)) {
            $this->QPV->add($qPV);
        }

        return $this;
    }

    public function removeQPV(QPV $qPV): static
    {
        $this->QPV->removeElement($qPV);

        return $this;
    }
}
