<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $promo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sex;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\ManyToMany(targetEntity=Skills::class, inversedBy="users")
     */
    private $id_skills;

    public function __construct()
    {
        $this->id_skills = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPromo(): ?string
    {
        return $this->promo;
    }

    public function setPromo(string $promo): self
    {
        $this->promo = $promo;

        return $this;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(string $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return Collection<int, Skills>
     */
    public function getIdSkills(): Collection
    {
        return $this->id_skills;
    }

    public function addIdSkill(Skills $idSkill): self
    {
        if (!$this->id_skills->contains($idSkill)) {
            $this->id_skills[] = $idSkill;
        }

        return $this;
    }

    public function removeIdSkill(Skills $idSkill): self
    {
        $this->id_skills->removeElement($idSkill);

        return $this;
    }
}
