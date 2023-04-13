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

    #[ORM\OneToOne(mappedBy: 'place_story', cascade: ['persist', 'remove'])]
    private ?PlaceTest $placeTest = null;

    #[ORM\Column(options: ["default" => false])]
    private ?bool $active = false;

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

    public function getPlaceTest(): ?PlaceTest
    {
        return $this->placeTest;
    }

    public function setPlaceTest(PlaceTest $placeTest): self
    {
        // set the owning side of the relation if necessary
        if ($placeTest->getPlaceStory() !== $this) {
            $placeTest->setPlaceStory($this);
        }

        $this->place_test = $place_test;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }
}
