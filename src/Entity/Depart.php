<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DepartRepository")
 */
class Depart
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
    private $city;

    /**
     * @ORM\Column(type="text")
     */
    private $descprition;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Adventurer", mappedBy="depart")
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

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getDescprition(): ?string
    {
        return $this->descprition;
    }

    public function setDescprition(string $descprition): self
    {
        $this->descprition = $descprition;

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
            $adventurer->setDepart($this);
        }

        return $this;
    }

    public function removeAdventurer(Adventurer $adventurer): self
    {
        if ($this->adventurers->contains($adventurer)) {
            $this->adventurers->removeElement($adventurer);
            // set the owning side to null (unless already changed)
            if ($adventurer->getDepart() === $this) {
                $adventurer->setDepart(null);
            }
        }

        return $this;
    }
}
