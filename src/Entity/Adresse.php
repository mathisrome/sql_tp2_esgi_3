<?php

namespace App\Entity;

use App\Repository\AdresseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdresseRepository::class)]
class Adresse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $rue = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\OneToMany(mappedBy: 'adresse', targetEntity: Salarie::class)]
    private Collection $salaries;

    #[ORM\ManyToOne(inversedBy: 'adresse')]
    private ?Region $region = null;

    #[ORM\ManyToOne(inversedBy: 'adresses')]
    private ?QPV $QPV = null;

    #[ORM\ManyToOne(inversedBy: 'adresse')]
    private ?Geocalisation $geocalisation = null;

    #[ORM\OneToMany(mappedBy: 'adresse', targetEntity: Retraite::class)]
    private Collection $retraites;

    public function __construct()
    {
        $this->salaries = new ArrayCollection();
        $this->retraites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): static
    {
        $this->rue = $rue;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

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
            $salary->setAdresse($this);
        }

        return $this;
    }

    public function removeSalary(Salarie $salary): static
    {
        if ($this->salaries->removeElement($salary)) {
            // set the owning side to null (unless already changed)
            if ($salary->getAdresse() === $this) {
                $salary->setAdresse(null);
            }
        }

        return $this;
    }

    public function getRegion(): ?Region
    {
        return $this->region;
    }

    public function setRegion(?Region $region): static
    {
        $this->region = $region;

        return $this;
    }

    public function getQPV(): ?QPV
    {
        return $this->QPV;
    }

    public function setQPV(?QPV $QPV): static
    {
        $this->QPV = $QPV;

        return $this;
    }

    public function getGeocalisation(): ?Geocalisation
    {
        return $this->geocalisation;
    }

    public function setGeocalisation(?Geocalisation $geocalisation): static
    {
        $this->geocalisation = $geocalisation;

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
            $retraite->setAdresse($this);
        }

        return $this;
    }

    public function removeRetraite(Retraite $retraite): static
    {
        if ($this->retraites->removeElement($retraite)) {
            // set the owning side to null (unless already changed)
            if ($retraite->getAdresse() === $this) {
                $retraite->setAdresse(null);
            }
        }

        return $this;
    }
}
