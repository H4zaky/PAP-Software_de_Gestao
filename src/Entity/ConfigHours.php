<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConfigHoursRepository")
 */
class ConfigHours
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="time")
     */
    private $startMorningTime;

    /**
     * @ORM\Column(type="time")
     */
    private $endMorningTime;

    /**
     * @ORM\Column(type="time")
     */
    private $startAfternoonTime;

    /**
     * @ORM\Column(type="time")
     */
    private $endAfternoonTime;

    /**
     * @ORM\Column(type="time")
     */
    private $tolerance;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Functionaries", mappedBy="schedule")
     */
    private $functionaries;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    public function __construct()
    {
        $this->functionaries = new ArrayCollection();
    }

    public function __toString()
    {
        return (string) $this->getName();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartMorningTime(): ?\DateTimeInterface
    {
        return $this->startMorningTime;
    }

    public function setStartMorningTime(\DateTimeInterface $startMorningTime): self
    {
        $this->startMorningTime = $startMorningTime;

        return $this;
    }

    public function getEndMorningTime(): ?\DateTimeInterface
    {
        return $this->endMorningTime;
    }

    public function setEndMorningTime(\DateTimeInterface $endMorningTime): self
    {
        $this->endMorningTime = $endMorningTime;

        return $this;
    }

    public function getStartAfternoonTime(): ?\DateTimeInterface
    {
        return $this->startAfternoonTime;
    }

    public function setStartAfternoonTime(\DateTimeInterface $startAfternoonTime): self
    {
        $this->startAfternoonTime = $startAfternoonTime;

        return $this;
    }

    public function getEndAfternoonTime(): ?\DateTimeInterface
    {
        return $this->endAfternoonTime;
    }

    public function setEndAfternoonTime(\DateTimeInterface $endAfternoonTime): self
    {
        $this->endAfternoonTime = $endAfternoonTime;

        return $this;
    }

    public function getTolerance(): ?\DateTimeInterface
    {
        return $this->tolerance;
    }

    public function setTolerance(\DateTimeInterface $tolerance): self
    {
        $this->tolerance = $tolerance;

        return $this;
    }

    /**
     * @return Collection|Functionaries[]
     */
    public function getFunctionaries(): Collection
    {
        return $this->functionaries;
    }

    public function addFunctionary(Functionaries $functionary): self
    {
        if (!$this->functionaries->contains($functionary)) {
            $this->functionaries[] = $functionary;
            $functionary->setSchedule($this);
        }

        return $this;
    }

    public function removeFunctionary(Functionaries $functionary): self
    {
        if ($this->functionaries->contains($functionary)) {
            $this->functionaries->removeElement($functionary);
            // set the owning side to null (unless already changed)
            if ($functionary->getSchedule() === $this) {
                $functionary->setSchedule(null);
            }
        }

        return $this;
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
}
