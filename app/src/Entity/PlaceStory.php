<?php

namespace App\Entity;

use App\Repository\PlaceStoryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaceStoryRepository::class)]
class PlaceStory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'placeStories')]
    private ?PlaceStoryType $type = null;

    #[ORM\ManyToOne(inversedBy: 'placeStories')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Place $place = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getType(): ?PlaceStoryType
    {
        return $this->type;
    }

    public function setType(?PlaceStoryType $type): self
    {
        $this->type = $type;

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
}
