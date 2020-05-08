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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    public function __construct()
    {
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
