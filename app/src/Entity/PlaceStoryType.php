<?php

namespace App\Entity;

use App\Repository\PlaceStoryTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaceStoryTypeRepository::class)]
class PlaceStoryType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: PlaceStory::class)]
    private Collection $placeStories;

    public function __construct()
    {
        $this->placeStories = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, PlaceStory>
     */
    public function getPlaceStories(): Collection
    {
        return $this->placeStories;
    }

    public function addPlaceStory(PlaceStory $placeStory): self
    {
        if (!$this->placeStories->contains($placeStory)) {
            $this->placeStories->add($placeStory);
            $placeStory->setType($this);
        }

        return $this;
    }

    public function removePlaceStory(PlaceStory $placeStory): self
    {
        if ($this->placeStories->removeElement($placeStory)) {
            // set the owning side to null (unless already changed)
            if ($placeStory->getType() === $this) {
                $placeStory->setType(null);
            }
        }

        return $this;
    }
}
