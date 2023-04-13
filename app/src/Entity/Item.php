<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column]
    private ?float $weight = null;

    #[ORM\ManyToMany(targetEntity: Place::class, inversedBy: 'items')]
    private Collection $places;

    #[ORM\OneToMany(mappedBy: 'item', targetEntity: PersoItem::class)]
    private Collection $persoItems;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $icon = null;

    #[ORM\OneToMany(mappedBy: 'item', targetEntity: Quest::class)]
    private Collection $quests;

    public function __construct()
    {
        $this->places = new ArrayCollection();
        $this->persoItems = new ArrayCollection();
        $this->quests = new ArrayCollection();
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

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return Collection<int, Place>
     */
    public function getPlaces(): Collection
    {
        return $this->places;
    }

    public function addPlace(Place $place): self
    {
        if (!$this->places->contains($place)) {
            $this->places->add($place);
        }

        return $this;
    }

    public function removePlace(Place $place): self
    {
        $this->places->removeElement($place);

        return $this;
    }

    /**
     * @return Collection<int, PersoItem>
     */
    public function getPersoItems(): Collection
    {
        return $this->persoItems;
    }

    public function addPersoItem(PersoItem $persoItem): self
    {
        if (!$this->persoItems->contains($persoItem)) {
            $this->persoItems->add($persoItem);
            $persoItem->setItem($this);
        }

        return $this;
    }

    public function removePersoItem(PersoItem $persoItem): self
    {
        if ($this->persoItems->removeElement($persoItem)) {
            // set the owning side to null (unless already changed)
            if ($persoItem->getItem() === $this) {
                $persoItem->setItem(null);
            }
        }

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

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
            $quest->setItem($this);
        }

        return $this;
    }

    public function removeQuest(Quest $quest): self
    {
        if ($this->quests->removeElement($quest)) {
            // set the owning side to null (unless already changed)
            if ($quest->getItem() === $this) {
                $quest->setItem(null);
            }
        }

        return $this;
    }
}
