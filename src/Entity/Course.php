<?php

namespace App\Entity;

use App\Repository\CourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CourseRepository::class)
 */
class Course
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $minPerson;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $maxPerson;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $priceCe;

    /**
     * @ORM\Column(type="float")
     */
    private $duration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $alt;

    /**
     * @ORM\ManyToOne(targetEntity=UserCourse::class, inversedBy="courses")
     */
    private $userCourse;

    /**
     * @ORM\ManyToOne(targetEntity=CourseType::class, inversedBy="course")
     */
    private $courseType;

    /**
     * @ORM\ManyToMany(targetEntity=media::class, inversedBy="courses")
     */
    private $media;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ticket;

    public function __construct()
    {
        $this->media = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getMinPerson(): ?int
    {
        return $this->minPerson;
    }

    public function setMinPerson(?int $minPerson): self
    {
        $this->minPerson = $minPerson;

        return $this;
    }

    public function getMaxPerson(): ?int
    {
        return $this->maxPerson;
    }

    public function setMaxPerson(?int $maxPerson): self
    {
        $this->maxPerson = $maxPerson;

        return $this;
    }

    public function getPriceCe(): ?float
    {
        return $this->priceCe;
    }

    public function setPriceCe(?float $priceCe): self
    {
        $this->priceCe = $priceCe;

        return $this;
    }

    public function getDuration(): ?float
    {
        return $this->duration;
    }

    public function setDuration(float $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(string $alt): self
    {
        $this->alt = $alt;

        return $this;
    }

    public function getUserCourse(): ?userCourse
    {
        return $this->userCourse;
    }

    public function setUserCourse(?userCourse $userCourse): self
    {
        $this->userCourse = $userCourse;

        return $this;
    }

    public function getCourseType(): ?courseType
    {
        return $this->courseType;
    }

    public function setCourseType(?courseType $courseType): self
    {
        $this->courseType = $courseType;

        return $this;
    }

    /**
     * @return Collection|media[]
     */
    public function getMedia(): Collection
    {
        return $this->media;
    }

    public function addMedium(media $medium): self
    {
        if (!$this->media->contains($medium)) {
            $this->media[] = $medium;
        }

        return $this;
    }

    public function removeMedium(media $medium): self
    {
        if ($this->media->contains($medium)) {
            $this->media->removeElement($medium);
        }

        return $this;
    }

    public function getTicket(): ?bool
    {
        return $this->ticket;
    }

    public function setTicket(bool $ticket): self
    {
        $this->ticket = $ticket;

        return $this;
    }
}
