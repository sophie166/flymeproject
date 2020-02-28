<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AstronauteRepository")
 */
class Astronaute
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
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Adventurer", mappedBy="astronaute")
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

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

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
            $adventurer->setAstronaute($this);
        }

        return $this;
    }

    public function removeAdventurer(Adventurer $adventurer): self
    {
        if ($this->adventurers->contains($adventurer)) {
            $this->adventurers->removeElement($adventurer);
            // set the owning side to null (unless already changed)
            if ($adventurer->getAstronaute() === $this) {
                $adventurer->setAstronaute(null);
            }
        }

        return $this;
    }
}
