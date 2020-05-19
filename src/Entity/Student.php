<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use ApiPlatform\Core\Annotation\ApiResource;


/**
 * @ORM\Entity(repositoryClass="App\Repository\StudentRepository")
 * @UniqueEntity("email")
 * @ApiResource
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
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "validators.errors.min_length",
     *      maxMessage = "validators.errors.min_length"
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=25)
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "There is not enought characters in this field (2 min)",
     *      maxMessage = "There is too many characters in this field (50 max)"
     * )
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     * @Assert\NotBlank
     * @Assert\Email
     * @Assert\Length(
     *      min = 2,
     *      max = 80,
     *      minMessage = "There is not enought characters in this field (2 min)",
     *      maxMessage = "There is too many characters in this field (80 max)"
     * )
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Classe", inversedBy="students")
     * @JoinColumn(name="classe_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $classe;

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

    public function __toString()
    {
        return $this->name;
    }

    public function getClasse(): ?Classe
    {
        return $this->classe;
    }

    public function setClasse(?Classe $classe): self
    {
        $this->classe = $classe;

        return $this;
    }
}
