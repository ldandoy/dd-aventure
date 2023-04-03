<?php

namespace App\Entity;

use App\Repository\PnjRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PnjRepository::class)]
class Pnj
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'pnjs')]
    private ?City $city = null;

    #[ORM\ManyToOne(inversedBy: 'pnjs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Place $place = null;

    #[ORM\ManyToOne(inversedBy: 'pnjs')]
    private ?Job $job = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPlace(): ?Place
    {
        return $this->place;
    }

    public function setPlace(?Place $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getJob(): ?Job
    {
        return $this->job;
    }

    public function setJob(?Job $job): self
    {
        $this->job = $job;

        return $this;
    }
}
