<?php

namespace App\Entity;

use App\Repository\PlaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    #[ORM\JoinColumn(nullable: false)]
    private ?City $city = null;

    #[ORM\OneToMany(mappedBy: 'place', targetEntity: Pnj::class, orphanRemoval: true)]
    private Collection $pnjs;

    #[ORM\OneToMany(mappedBy: 'place', targetEntity: Perso::class, orphanRemoval: true)]
    private Collection $persos;

    public function __construct()
    {
        $this->pnjs = new ArrayCollection();
        $this->persos = new ArrayCollection();
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
}
