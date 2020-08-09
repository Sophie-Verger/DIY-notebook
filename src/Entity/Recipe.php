<?php

namespace App\Entity;

use App\Repository\RecipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecipeRepository::class)
 */
class Recipe
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $recipe;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $completion_time;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $conservation_time;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $test_opinion;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $fire;

    /**
     * @ORM\ManyToMany(targetEntity=Equipment::class, inversedBy="recipes")
     */
    private $equipment;

    /**
     * @ORM\ManyToMany(targetEntity=Measure::class, inversedBy="recipes")
     */
    private $measures;

    /**
     * @ORM\ManyToOne(targetEntity=Domain::class, inversedBy="recipes")
     */
    private $domain;

    public function __construct()
    {
        $this->equipment = new ArrayCollection();
        $this->measures = new ArrayCollection();
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

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getRecipe(): ?string
    {
        return $this->recipe;
    }

    public function setRecipe(string $recipe): self
    {
        $this->recipe = $recipe;

        return $this;
    }

    public function getCompletionTime(): ?int
    {
        return $this->completion_time;
    }

    public function setCompletionTime(?int $completion_time): self
    {
        $this->completion_time = $completion_time;

        return $this;
    }

    public function getConservationTime(): ?int
    {
        return $this->conservation_time;
    }

    public function setConservationTime(?int $conservation_time): self
    {
        $this->conservation_time = $conservation_time;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getTestOpinion(): ?string
    {
        return $this->test_opinion;
    }

    public function setTestOpinion(?string $test_opinion): self
    {
        $this->test_opinion = $test_opinion;

        return $this;
    }

    public function getFire(): ?bool
    {
        return $this->fire;
    }

    public function setFire(?bool $fire): self
    {
        $this->fire = $fire;

        return $this;
    }

    /**
     * @return Collection|Equipment[]
     */
    public function getEquipment(): Collection
    {
        return $this->equipment;
    }

    public function addEquipment(Equipment $equipment): self
    {
        if (!$this->equipment->contains($equipment)) {
            $this->equipment[] = $equipment;
        }

        return $this;
    }

    public function removeEquipment(Equipment $equipment): self
    {
        if ($this->equipment->contains($equipment)) {
            $this->equipment->removeElement($equipment);
        }

        return $this;
    }

    /**
     * @return Collection|Measure[]
     */
    public function getMeasures(): Collection
    {
        return $this->measures;
    }

    public function addMeasure(Measure $measure): self
    {
        if (!$this->measures->contains($measure)) {
            $this->measures[] = $measure;
        }

        return $this;
    }

    public function removeMeasure(Measure $measure): self
    {
        if ($this->measures->contains($measure)) {
            $this->measures->removeElement($measure);
        }

        return $this;
    }

    public function getDomain(): ?Domain
    {
        return $this->domain;
    }

    public function setDomain(?Domain $domain): self
    {
        $this->domain = $domain;

        return $this;
    }
}
