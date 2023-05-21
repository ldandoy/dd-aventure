<?php

namespace App\Entity;

use App\Repository\PlaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: PlaceRepository::class)]
#[Vich\Uploadable]
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

    #[ORM\Column(type: "boolean", options: ["default" => "1"])]
    private ?bool $active = true;

    #[ORM\Column(type: "boolean", options: ["default" => "0"])]
    private ?bool $donjon = false;

    #[Vich\UploadableField(mapping: 'places_pictures', fileNameProperty: 'imageName', size: 'imageSize')]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?string $imageName = null;

    #[ORM\Column(nullable: true)]
    private ?int $imageSize = null;

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

    #[ORM\OneToMany(mappedBy: 'place', targetEntity: PlaceStory::class, orphanRemoval: true)]
    private Collection $placeStories;

    #[ORM\ManyToMany(targetEntity: Item::class, mappedBy: 'places')]
    private Collection $items;

    #[ORM\OneToMany(mappedBy: 'place', targetEntity: PlaceTest::class)]
    private Collection $placeTests;

    #[ORM\ManyToMany(targetEntity: Freak::class, mappedBy: 'places')]
    private Collection $freaks;

    public function __construct()
    {
        $this->pnjs = new ArrayCollection();
        $this->persos = new ArrayCollection();
        $this->quests = new ArrayCollection();
        $this->placeStories = new ArrayCollection();
        $this->items = new ArrayCollection();
        $this->placeTests = new ArrayCollection();
        $this->freaks = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
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

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function isDonjon(): ?bool
    {
        return $this->donjon;
    }

    public function setDonjon(bool $donjon): self
    {
        $this->donjon = $donjon;

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

    public function getCreated()
    {
        return $this->created;
    }

    public function getUpdated()
    {
        return $this->updated;
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

    /**
     * @return Collection<int, Item>
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Item $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items->add($item);
            $item->addPlace($this);
        }

        return $this;
    }

    public function removeItem(Item $item): self
    {
        if ($this->items->removeElement($item)) {
            $item->removePlace($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, PlaceTest>
     */
    public function getPlaceTests(): Collection
    {
        return $this->placeTests;
    }

    public function addPlaceTest(PlaceTest $placeTest): self
    {
        if (!$this->placeTests->contains($placeTest)) {
            $this->placeTests->add($placeTest);
            $placeTest->setPlace($this);
        }

        return $this;
    }

    public function removePlaceTest(PlaceTest $placeTest): self
    {
        if ($this->placeTests->removeElement($placeTest)) {
            // set the owning side to null (unless already changed)
            if ($placeTest->getPlace() === $this) {
                $placeTest->setPlace(null);
            }
        }

        return $this;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updated = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageSize(?int $imageSize): void
    {
        $this->imageSize = $imageSize;
    }

    public function getImageSize(): ?int
    {
        return $this->imageSize;
    }

    /**
     * @return Collection<int, Freak>
     */
    public function getFreaks(): Collection
    {
        return $this->freaks;
    }

    public function addFreak(Freak $freak): self
    {
        if (!$this->freaks->contains($freak)) {
            $this->freaks->add($freak);
            $freak->addPlace($this);
        }

        return $this;
    }

    public function removeFreak(Freak $freak): self
    {
        if ($this->freaks->removeElement($freak)) {
            $freak->removePlace($this);
        }

        return $this;
    }
}
