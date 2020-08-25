<?php

namespace App\Entity;

use App\Repository\UserTicketBookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserTicketBookRepository::class)
 */
class UserTicketBook
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $datePurchase;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="userTicketBooks")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=ticketBook::class, mappedBy="userTicketBook")
     */
    private $ticketBooks;

    public function __construct()
    {
        $this->ticketBooks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatePurchase(): ?\DateTimeInterface
    {
        return $this->datePurchase;
    }

    public function setDatePurchase(?\DateTimeInterface $datePurchase): self
    {
        $this->datePurchase = $datePurchase;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }


    /**
     * @return Collection|TicketBook[]
     */
    public function getTicketBooks(): Collection
    {
        return $this->ticketBooks;
    }

    public function addTicketBook(TicketBook $ticketBook): self
    {
        if (!$this->ticketBooks->contains($ticketBook)) {
            $this->ticketBooks[] = $ticketBook;
            $ticketBook->setUserTicketBook($this);
        }

        return $this;
    }

    public function removeTicketBook(TicketBook $ticketBook): self
    {
        if ($this->ticketBooks->contains($ticketBook)) {
            $this->ticketBooks->removeElement($ticketBook);
            // set the owning side to null (unless already changed)
            if ($ticketBook->getUserTicketBook() === $this) {
                $ticketBook->setUserTicketBook(null);
            }
        }

        return $this;
    }
}
