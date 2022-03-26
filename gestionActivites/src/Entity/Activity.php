<?php

namespace App\Entity;

use App\Repository\ActivityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActivityRepository::class)]
class Activity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'activityId')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'activityInscrit')]
    private $usersInscrit;

    public function __construct()
    {
        $this->usersInscrit = new ArrayCollection();
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

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsersInscrit(): Collection
    {
        return $this->usersInscrit;
    }

    public function addUsersInscrit(User $usersInscrit): self
    {
        if (!$this->usersInscrit->contains($usersInscrit)) {
            $this->usersInscrit[] = $usersInscrit;
            $usersInscrit->addActivityInscrit($this);
        }

        return $this;
    }

    public function removeUsersInscrit(User $usersInscrit): self
    {
        if ($this->usersInscrit->removeElement($usersInscrit)) {
            $usersInscrit->removeActivityInscrit($this);
        }

        return $this;
    }

}
