<?php

namespace App\Entity;

use App\Repository\DeplacementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DeplacementRepository::class)]
class Deplacement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $positionX = null;

    #[ORM\Column(length: 50)]
    private ?string $positionY = null;

    #[ORM\Column(length: 50)]
    private ?string $arriveX = null;

    #[ORM\Column(length: 50)]
    private ?string $arriveY = null;

    #[ORM\Column(length: 255)]
    private ?string $typeDeMouvement = null;

    #[ORM\ManyToOne(inversedBy: 'deplacements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPositionX(): ?string
    {
        return $this->positionX;
    }

    public function setPositionX(string $positionX): static
    {
        $this->positionX = $positionX;

        return $this;
    }

    public function getPositionY(): ?string
    {
        return $this->positionY;
    }

    public function setPositionY(string $positionY): static
    {
        $this->positionY = $positionY;

        return $this;
    }

    public function getArriveX(): ?string
    {
        return $this->arriveX;
    }

    public function setArriveX(string $arriveX): static
    {
        $this->arriveX = $arriveX;

        return $this;
    }

    public function getArriveY(): ?string
    {
        return $this->arriveY;
    }

    public function setArriveY(string $arriveY): static
    {
        $this->arriveY = $arriveY;

        return $this;
    }

    public function getTypeDeMouvement(): ?string
    {
        return $this->typeDeMouvement;
    }

    public function setTypeDeMouvement(string $typeDeMouvement): static
    {
        $this->typeDeMouvement = $typeDeMouvement;

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
}
