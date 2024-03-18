<?php

namespace App\Entity;

use App\Repository\ResultatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\ApiFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use App\State\UserStateProcessor;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;


#[ApiResource()]

#[ORM\Entity(repositoryClass: ResultatRepository::class)]

class Resultat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $score = 0;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(inversedBy: 'resultats')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\OneToMany(targetEntity: Partie::class, mappedBy: 'resultat', orphanRemoval: true)]
    private Collection $partie;

    public function __construct()
    {
        $this->partie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Partie>
     */
    public function getPartie(): Collection
    {
        return $this->partie;
    }

    public function addPartie(Partie $partie): static
    {
        if (!$this->partie->contains($partie)) {
            $this->partie->add($partie);
            $partie->setResultat($this);
        }

        return $this;
    }

    public function removePartie(Partie $partie): static
    {
        if ($this->partie->removeElement($partie)) {
            // set the owning side to null (unless already changed)
            if ($partie->getResultat() === $this) {
                $partie->setResultat(null);
            }
        }

        return $this;
    }
}
