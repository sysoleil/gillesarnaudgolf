<?php

namespace App\Entity;

use App\Repository\UserCourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserCourseRepository::class)
 */
class UserCourse
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateCourse;

    /**
     * @ORM\Column(type="date")
     */
    private $datePurchase;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="float")
     */
    private $hourStart;

    /**
     * @ORM\Column(type="float")
     */
    private $hourEnd;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="userCourses")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Course::class, mappedBy="userCourse")
     */
    private $courses;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCourse(): ?\DateTimeInterface
    {
        return $this->dateCourse;
    }

    public function setDateCourse(\DateTimeInterface $dateCourse): self
    {
        $this->dateCourse = $dateCourse;

        return $this;
    }

    public function getDatePurchase(): ?\DateTimeInterface
    {
        return $this->datePurchase;
    }

    public function setDatePurchase(\DateTimeInterface $datePurchase): self
    {
        $this->datePurchase = $datePurchase;

        return $this;
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

    public function getHourStart(): ?float
    {
        return $this->hourStart;
    }

    public function setHourStart(float $hourStart): self
    {
        $this->hourStart = $hourStart;

        return $this;
    }

    public function getHourEnd(): ?float
    {
        return $this->hourEnd;
    }

    public function setHourEnd(float $hourEnd): self
    {
        $this->hourEnd = $hourEnd;

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
     * @return Collection|Course[]
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function addCourse(Course $course): self
    {
        if (!$this->courses->contains($course)) {
            $this->courses[] = $course;
            $course->setUserCourse($this);
        }

        return $this;
    }

    public function removeCourse(Course $course): self
    {
        if ($this->courses->contains($course)) {
            $this->courses->removeElement($course);
            // set the owning side to null (unless already changed)
            if ($course->getUserCourse() === $this) {
                $course->setUserCourse(null);
            }
        }

        return $this;
    }
}
