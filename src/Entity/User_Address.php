<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 */
class User_Address
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    private int $id;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="O endereço é obrigatório")
     */
    private string $street;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="O número de área é obrigatório")
     */
    private string $number;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    private string $complement;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="O bairro é obrigatório")
     */
    private string $district;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="A cidade é obrigatória")
     */
    private string $city;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="O estado é obrigatório")
     */
    private string $state;

    public function getIdAddress(): int
    {
        return $this->id;
    }
    
    /**
     *  @ORM\Column(type="datetime")
     */
    private \DateTime $createdAt;

    public function __construct()
    {
        $this -> create = new \DateTime();
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    //GET e SET para STREET
    public function getStreet(): string
    {
        return $this->street;
    }
    public function setStreet(string $street): void
    {
        $this->updatedAt = new \DateTime();
        $this->street = $street;
    }

    //GET e SET para NUMBER
    public function getNumber(): int
    {
        return $this->number;
    }
    public function setNumber(int $number): void
    {
        $this->updatedAt = new \DateTime();
        $this->number = $number;
    }

    //GET e SET para COMPLEMENT
    public function getComplement(): string
    {
        return $this->complement;
    }
    public function setComplement(string $complement): void
    {
        $this->updatedAt = new \DateTime();
        $this->complement = $complement;
    }

    //GET e SET para DISTRICT
    public function getDistrict(): string
    {
        return $this->district;
    }
    public function setDistrict(string $district): void
    {
        $this->updatedAt = new \DateTime();
        $this->district = $district;
    }

    //GET e SET para CITY
    public function getCity(): string
    {
        return $this->city;
    }
    public function setCity(string $city): void
    {
        $this->updatedAt = new \DateTime();
        $this->city = $city;
    }

    //GET e SET para STATE
    public function getState(): string
    {
        return $this->state;
    }
    public function setState(string $state): void
    {
        $this->updatedAt = new \DateTime();
        $this->state = $state;
    }
}
