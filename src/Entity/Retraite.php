<?php

namespace App\Entity;

use App\Repository\RetraiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RetraiteRepository::class)]
class Retraite extends Utilisateur
{

}
