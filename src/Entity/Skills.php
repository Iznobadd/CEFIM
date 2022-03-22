<?php

namespace App\Entity;

use App\Repository\SkillsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SkillsRepository::class)
 */
class Skills
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $laravel;

    /**
     * @ORM\Column(type="boolean")
     */
    private $php;

    /**
     * @ORM\Column(type="boolean")
     */
    private $symfony;

    /**
     * @ORM\Column(type="boolean")
     */
    private $html;

    /**
     * @ORM\Column(type="boolean")
     */
    private $css;

    /**
     * @ORM\Column(type="boolean")
     */
    private $javascript;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="id_skills")
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLaravel(): ?bool
    {
        return $this->laravel;
    }

    public function setLaravel(bool $laravel): self
    {
        $this->laravel = $laravel;

        return $this;
    }

    public function getPhp(): ?bool
    {
        return $this->php;
    }

    public function setPhp(bool $php): self
    {
        $this->php = $php;

        return $this;
    }

    public function getSymfony(): ?bool
    {
        return $this->symfony;
    }

    public function setSymfony(bool $symfony): self
    {
        $this->symfony = $symfony;

        return $this;
    }

    public function getHtml(): ?bool
    {
        return $this->html;
    }

    public function setHtml(bool $html): self
    {
        $this->html = $html;

        return $this;
    }

    public function getCss(): ?bool
    {
        return $this->css;
    }

    public function setCss(bool $css): self
    {
        $this->css = $css;

        return $this;
    }

    public function getJavascript(): ?bool
    {
        return $this->javascript;
    }

    public function setJavascript(bool $javascript): self
    {
        $this->javascript = $javascript;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addIdSkill($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeIdSkill($this);
        }

        return $this;
    }
}
