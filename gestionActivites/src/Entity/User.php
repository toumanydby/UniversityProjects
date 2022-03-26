<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @UniqueEntity(fields={"username"}, message="There is already an account with this username")
 */
#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $username;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'string', length: 255)]
    private $prenom;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Activity::class, orphanRemoval: true)]
    private $activityId;

    #[ORM\ManyToMany(targetEntity: Activity::class, inversedBy: 'usersInscrit')]
    private $activityInscrit;

    public function __construct()
    {
        $this->activityId = new ArrayCollection();
        $this->activityInscrit = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_ANIMATEUR

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return Collection|Activity[]
     */
    public function getActivityId(): Collection
    {
        return $this->activityId;
    }

    public function addActivityId(Activity $activityId): self
    {
        if (!$this->activityId->contains($activityId)) {
            $this->activityId[] = $activityId;
            $activityId->setUser($this);
        }

        return $this;
    }

    public function removeActivityId(Activity $activityId): self
    {
        if ($this->activityId->removeElement($activityId)) {
            // set the owning side to null (unless already changed)
            if ($activityId->getUser() === $this) {
                $activityId->setUser(null);
            }
        }

        return $this;
    }



    /**
     * @return Collection|Activity[]
     */
    public function getActivityInscrit(): Collection
    {
        return $this->activityInscrit;
    }

    public function addActivityInscrit(Activity $activityInscrit): self
    {
        if (!$this->activityInscrit->contains($activityInscrit)) {
            $this->activityInscrit[] = $activityInscrit;
        }

        return $this;
    }

    public function removeActivityInscrit(Activity $activityInscrit): self
    {
        $this->activityInscrit->removeElement($activityInscrit);

        return $this;
    }


    #[Pure]
    public function __toString(): string
    {
        $user = $this->getId();
        return $user;
    }
}
