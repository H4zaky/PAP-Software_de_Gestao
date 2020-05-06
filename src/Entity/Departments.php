<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DepartmentsRepository")
 */
class Departments
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
    private $email;

    /**
     * @ORM\Column(type="integer")
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $where_it_is;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Functionaries", mappedBy="department")
     */
    private $functionaries;

    public function __construct()
    {
        $this->functionaries = new ArrayCollection();
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getWhereItIs(): ?string
    {
        return $this->where_it_is;
    }

    public function setWhereItIs(string $where_it_is): self
    {
        $this->where_it_is = $where_it_is;

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
            $functionary->setDepartment($this);
        }

        return $this;
    }

    public function removeFunctionary(Functionaries $functionary): self
    {
        if ($this->functionaries->contains($functionary)) {
            $this->functionaries->removeElement($functionary);
            // set the owning side to null (unless already changed)
            if ($functionary->getDepartment() === $this) {
                $functionary->setDepartment(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
