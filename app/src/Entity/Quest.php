<?php

namespace App\Entity;

use App\Repository\QuestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestRepository::class)]
class Quest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'quests')]
    private ?Pnj $pnj = null;

    #[ORM\Column]
    private ?int $xp = null;

    #[ORM\ManyToOne(inversedBy: 'quests')]
    private ?Place $place = null;

    #[ORM\OneToMany(mappedBy: 'quest', targetEntity: QuestStep::class)]
    private Collection $questSteps;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'quests')]
    private Collection $users;

    public function __construct()
    {
        $this->questSteps = new ArrayCollection();
        $this->users = new ArrayCollection();
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

    public function getPnj(): ?Pnj
    {
        return $this->pnj;
    }

    public function setPnj(?Pnj $pnj): self
    {
        $this->pnj = $pnj;

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

    public function getPlace(): ?Place
    {
        return $this->place;
    }

    public function setPlace(?Place $place): self
    {
        $this->place = $place;

        return $this;
    }

    /**
     * @return Collection<int, QuestStep>
     */
    public function getQuestSteps(): Collection
    {
        return $this->questSteps;
    }

    public function addQuestStep(QuestStep $questStep): self
    {
        if (!$this->questSteps->contains($questStep)) {
            $this->questSteps->add($questStep);
            $questStep->setQuest($this);
        }

        return $this;
    }

    public function removeQuestStep(QuestStep $questStep): self
    {
        if ($this->questSteps->removeElement($questStep)) {
            // set the owning side to null (unless already changed)
            if ($questStep->getQuest() === $this) {
                $questStep->setQuest(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->addQuest($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeQuest($this);
        }

        return $this;
    }
}
