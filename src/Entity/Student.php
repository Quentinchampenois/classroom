<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Entity(repositoryClass="App\Repository\StudentRepository")
 * @UniqueEntity("email")
 */
class Student
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", options={"unsigned":true})
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=25)
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=25)
     * @Assert\NotBlank
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     * @Assert\NotBlank
     * @Assert\Email
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Classe", inversedBy="students")
     */
    private $classID;

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

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

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

    public function getClassID(): ?Classe
    {
        return $this->classID;
    }

    public function setClassID(?Classe $classID): self
    {
        $this->classID = $classID;

        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }
}
