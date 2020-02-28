<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdventurerRepository")
 */
class Adventurer
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
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Depart", inversedBy="adventurers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $depart;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Spaceship", inversedBy="adventurers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $spaceship;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Activity", inversedBy="adventurers")
     */
    private $activity;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Astronaute", inversedBy="adventurers")
     */
    private $astronaute;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDepart(): ?Depart
    {
        return $this->depart;
    }

    public function setDepart(?Depart $depart): self
    {
        $this->depart = $depart;

        return $this;
    }

    public function getSpaceship(): ?Spaceship
    {
        return $this->spaceship;
    }

    public function setSpaceship(?Spaceship $spaceship): self
    {
        $this->spaceship = $spaceship;

        return $this;
    }

    public function getActivity(): ?Activity
    {
        return $this->activity;
    }

    public function setActivity(?Activity $activity): self
    {
        $this->activity = $activity;

        return $this;
    }

    public function getAstronaute(): ?Astronaute
    {
        return $this->astronaute;
    }

    public function setAstronaute(?Astronaute $astronaute): self
    {
        $this->astronaute = $astronaute;

        return $this;
    }
}
