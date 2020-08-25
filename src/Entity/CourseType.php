<?php

namespace App\Entity;

use App\Repository\CourseTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CourseTypeRepository::class)
 */
class CourseType
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=35)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=course::class, mappedBy="courseType")
     */
    private $course;

    public function __construct()
    {
        $this->course = new ArrayCollection();
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

    /**
     * @return Collection|course[]
     */
    public function getCourse(): Collection
    {
        return $this->course;
    }

    public function addCourse(course $course): self
    {
        if (!$this->course->contains($course)) {
            $this->course[] = $course;
            $course->setCourseType($this);
        }

        return $this;
    }

    public function removeCourse(course $course): self
    {
        if ($this->course->contains($course)) {
            $this->course->removeElement($course);
            // set the owning side to null (unless already changed)
            if ($course->getCourseType() === $this) {
                $course->setCourseType(null);
            }
        }

        return $this;
    }
}
