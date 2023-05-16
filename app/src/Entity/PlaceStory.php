<?php

namespace App\Entity;

use App\Repository\PlaceStoryRepository;
use Gedmo\Mapping\Annotation as Gedmo;
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

    /**
     * @var \DateTime
     */
    #[Gedmo\Timestampable(on: 'create')]
    #[ORM\Column(name: 'created', type: Types::DATETIME_MUTABLE, options: ["default" => "CURRENT_TIMESTAMP"])]
    private $created;

    /**
     * @var \DateTime
     */
    #[ORM\Column(name: 'updated', type: Types::DATETIME_MUTABLE, options: ["default" => "CURRENT_TIMESTAMP"])]
    #[Gedmo\Timestampable(on: "update")]
    private $updated;

    #[ORM\Column(type: "boolean", options: ["default" => "1"])]
    private ?bool $active = true;

    public function __toString()
    {
        return $this->description;
    }

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

    public function getCreated()
    {
        return $this->created;
    }

    public function getUpdated()
    {
        return $this->updated;
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
