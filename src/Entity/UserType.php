<?php

namespace App\Entity;

use App\Repository\UserTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserTypeRepository::class)
 */
class UserType
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity=user::class, mappedBy="userType")
     */
    private $user;

    public function __construct()
    {
        $this->user = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getUser(): ArrayCollection
    {
        return $this->user;
    }

    /**
     * @param ArrayCollection $user
     */
    public function setUser(ArrayCollection $user): void
    {
        $this->user = $user;
    }

    /**
     * @return Collection|user[]
     */


    public function addUser(user $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
            $user->setUserType($this);
        }

        return $this;
    }

    public function removeUser(user $user): self
    {
        if ($this->user->contains($user)) {
            $this->user->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getUserType() === $this) {
                $user->setUserType(null);
            }
        }

        return $this;
    }
}
