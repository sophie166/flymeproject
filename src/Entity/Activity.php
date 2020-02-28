<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActivityRepository")
 */
class Activity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Adventurer", mappedBy="activity")
     */
    private $adventurers;

    public function __construct()
    {
        $this->adventurers = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Adventurer[]
     */
    public function getAdventurers(): Collection
    {
        return $this->adventurers;
    }

    public function addAdventurer(Adventurer $adventurer): self
    {
        if (!$this->adventurers->contains($adventurer)) {
            $this->adventurers[] = $adventurer;
            $adventurer->setActivity($this);
        }

        return $this;
    }

    public function removeAdventurer(Adventurer $adventurer): self
    {
        if ($this->adventurers->contains($adventurer)) {
            $this->adventurers->removeElement($adventurer);
            // set the owning side to null (unless already changed)
            if ($adventurer->getActivity() === $this) {
                $adventurer->setActivity(null);
            }
        }

        return $this;
    }
}
