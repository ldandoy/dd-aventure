<?php

namespace App\Entity;

use App\Repository\PlaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaceRepository::class)]
class Place
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'places')]
    private ?City $city = null;

    #[ORM\OneToMany(mappedBy: 'place', targetEntity: Pnj::class, orphanRemoval: true)]
    private Collection $pnjs;

    #[ORM\OneToMany(mappedBy: 'place', targetEntity: Perso::class, orphanRemoval: true)]
    private Collection $persos;

    #[ORM\OneToMany(mappedBy: 'place', targetEntity: Quest::class)]
    private Collection $quests;

    #[ORM\ManyToOne(inversedBy: 'places')]
    private ?Zone $zone = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'place', targetEntity: PlaceStory::class, orphanRemoval: true)]
    private Collection $placeStories;

    public function __construct()
    {
        $this->pnjs = new ArrayCollection();
        $this->persos = new ArrayCollection();
        $this->quests = new ArrayCollection();
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

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return Collection<int, Pnj>
     */
    public function getPnjs(): Collection
    {
        return $this->pnjs;
    }

    public function addPnj(Pnj $pnj): self
    {
        if (!$this->pnjs->contains($pnj)) {
            $this->pnjs->add($pnj);
            $pnj->setPlace($this);
        }

        return $this;
    }

    public function removePnj(Pnj $pnj): self
    {
        if ($this->pnjs->removeElement($pnj)) {
            // set the owning side to null (unless already changed)
            if ($pnj->getPlace() === $this) {
                $pnj->setPlace(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Perso>
     */
    public function getPersos(): Collection
    {
        return $this->persos;
    }

    public function addPerso(Perso $perso): self
    {
        if (!$this->persos->contains($perso)) {
            $this->persos->add($perso);
            $perso->setPlace($this);
        }

        return $this;
    }

    public function removePerso(Perso $perso): self
    {
        if ($this->persos->removeElement($perso)) {
            // set the owning side to null (unless already changed)
            if ($perso->getPlace() === $this) {
                $perso->setPlace(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Quest>
     */
    public function getQuests(): Collection
    {
        return $this->quests;
    }

    public function addQuest(Quest $quest): self
    {
        if (!$this->quests->contains($quest)) {
            $this->quests->add($quest);
            $quest->setPlace($this);
        }

        return $this;
    }

    public function removeQuest(Quest $quest): self
    {
        if ($this->quests->removeElement($quest)) {
            // set the owning side to null (unless already changed)
            if ($quest->getPlace() === $this) {
                $quest->setPlace(null);
            }
        }

        return $this;
    }

    public function getZone(): ?Zone
    {
        return $this->zone;
    }

    public function setZone(?Zone $zone): self
    {
        $this->zone = $zone;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
            $placeStory->setPlace($this);
        }

        return $this;
    }

    public function removePlaceStory(PlaceStory $placeStory): self
    {
        if ($this->placeStories->removeElement($placeStory)) {
            // set the owning side to null (unless already changed)
            if ($placeStory->getPlace() === $this) {
                $placeStory->setPlace(null);
            }
        }

        return $this;
    }
}
