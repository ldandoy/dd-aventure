<?php

namespace App\Entity;

use App\Repository\PersoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersoRepository::class)]
class Perso
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $puissance = null;

    #[ORM\Column]
    private ?int $vitesse = null;

    #[ORM\Column]
    private ?int $pdv = null;

    #[ORM\Column]
    private ?int $dexterite = null;

    #[ORM\Column]
    private ?int $charisme = null;

    #[ORM\Column]
    private ?int $intelligence = null;

    #[ORM\Column]
    private ?int $constitution = null;

    /**
     * @var \DateTime
     */
    #[Gedmo\Timestampable(on: 'create')]
    #[ORM\Column(name: 'created', type: Types::DATETIME_MUTABLE)]
    private $created;

    /**
     * @var \DateTime
     */
    #[ORM\Column(name: 'updated', type: Types::DATETIME_MUTABLE)]
    #[Gedmo\Timestampable(on: "update")]
    private $updated;

    #[ORM\ManyToOne(inversedBy: 'persos')]
    private ?User $user;

    #[ORM\ManyToOne(inversedBy: 'persos')]
    private ?Place $place;

    #[ORM\Column]
    private ?int $sagesse = null;

    #[ORM\OneToMany(mappedBy: 'perso', targetEntity: PersoItem::class)]
    private Collection $persoItems;

    public function __construct()
    {
        $this->persoItems = new ArrayCollection();
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

    public function getPuissance(): ?int
    {
        return $this->puissance;
    }

    public function setPuissance(int $puissance): self
    {
        $this->puissance = $puissance;

        return $this;
    }

    public function getVitesse(): ?int
    {
        return $this->vitesse;
    }

    public function setVitesse(int $vitesse): self
    {
        $this->vitesse = $vitesse;

        return $this;
    }

    public function getPdv(): ?int
    {
        return $this->pdv;
    }

    public function setPdv(int $pdv): self
    {
        $this->pdv = $pdv;

        return $this;
    }

    public function getDexterite(): ?int
    {
        return $this->dexterite;
    }

    public function setDexterite(int $dexterite): self
    {
        $this->dexterite = $dexterite;

        return $this;
    }

    public function getCharisme(): ?int
    {
        return $this->charisme;
    }

    public function setCharisme(int $charisme): self
    {
        $this->charisme = $charisme;

        return $this;
    }

    public function getIntelligence(): ?int
    {
        return $this->intelligence;
    }

    public function setIntelligence(int $intelligence): self
    {
        $this->intelligence = $intelligence;

        return $this;
    }

    public function getConstitution(): ?int
    {
        return $this->constitution;
    }

    public function setConstitution(int $constitution): self
    {
        $this->constitution = $constitution;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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

    public function getSagesse(): ?int
    {
        return $this->sagesse;
    }

    public function setSagesse(int $sagesse): self
    {
        $this->sagesse = $sagesse;

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
            $persoItem->setPerso($this);
        }

        return $this;
    }

    public function removePersoItem(PersoItem $persoItem): self
    {
        if ($this->persoItems->removeElement($persoItem)) {
            // set the owning side to null (unless already changed)
            if ($persoItem->getPerso() === $this) {
                $persoItem->setPerso(null);
            }
        }

        return $this;
    }
}
