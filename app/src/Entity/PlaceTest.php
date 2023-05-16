<?php

namespace App\Entity;

use App\Repository\PlaceTestRepository;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaceTestRepository::class)]
class PlaceTest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $difficulty = null;

    #[ORM\Column(length: 255)]
    private ?string $skill = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $text_successed = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $text_failed = null;

    #[ORM\Column]
    private ?int $xp = null;

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

    #[ORM\Column(length: 255)]
    private ?string $action = null;

    #[ORM\OneToOne(inversedBy: 'placeTest', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?PlaceStory $place_story = null;

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

    public function getDifficulty(): ?int
    {
        return $this->difficulty;
    }

    public function setDifficulty(int $difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function getSkill(): ?string
    {
        return $this->skill;
    }

    public function setSkill(string $skill): self
    {
        $this->skill = $skill;

        return $this;
    }

    public function getTextSuccessed(): ?string
    {
        return $this->text_successed;
    }

    public function setTextSuccessed(string $text_successed): self
    {
        $this->text_successed = $text_successed;

        return $this;
    }

    public function getTextFailed(): ?string
    {
        return $this->text_failed;
    }

    public function setTextFailed(string $text_failed): self
    {
        $this->text_failed = $text_failed;

        return $this;
    }

    public function getXp(): ?int
    {
        return $this->xp;
    }

    public function setXp(int $xp): self
    {
        $this->xp = $xp;

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

    public function getCreated()
    {
        return $this->created;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

    public function getPlaceStory(): ?PlaceStory
    {
        return $this->place_story;
    }

    public function setPlaceStory(PlaceStory $place_story): self
    {
        $this->place_story = $place_story;

        return $this;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(string $action): self
    {
        $this->action = $action;

        return $this;
    }
}
