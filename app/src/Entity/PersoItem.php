<?php

namespace App\Entity;

use App\Repository\PersoItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersoItemRepository::class)]
class PersoItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'persoItems')]
    private ?Perso $perso = null;

    #[ORM\ManyToOne(inversedBy: 'persoItems')]
    private ?Item $item = null;

    #[ORM\Column]
    private ?int $qte = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPerso(): ?Perso
    {
        return $this->perso;
    }

    public function setPerso(?Perso $perso): self
    {
        $this->perso = $perso;

        return $this;
    }

    public function getItem(): ?Item
    {
        return $this->item;
    }

    public function setItem(?Item $item): self
    {
        $this->item = $item;

        return $this;
    }

    public function getQte(): ?int
    {
        return $this->qte;
    }

    public function setQte(int $qte): self
    {
        $this->qte = $qte;

        return $this;
    }
}
