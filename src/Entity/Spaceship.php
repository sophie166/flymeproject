<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SpaceshipRepository")
 */
class Spaceship
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
     * @ORM\Column(type="integer")
     */
    private $capacity;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Adventurer", mappedBy="spaceship")
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

    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity): self
    {
        $this->capacity = $capacity;

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
            $adventurer->setSpaceship($this);
        }

        return $this;
    }

    public function removeAdventurer(Adventurer $adventurer): self
    {
        if ($this->adventurers->contains($adventurer)) {
            $this->adventurers->removeElement($adventurer);
            // set the owning side to null (unless already changed)
            if ($adventurer->getSpaceship() === $this) {
                $adventurer->setSpaceship(null);
            }
        }

        return $this;
    }
}
