<?php

namespace App\Entity;

use App\Entity\User_Address;
use App\Entity\User_Contact_Phone;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity()
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="O nome é obrigatório")
     * @Assert\Length(
     *     min=3,
     *     max=100,
     *     minMessage="O nome deve ter pelo menos 3 caracteres"
     * )
     */
    private string $name;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="O sobrenome é obrigatório")
     * @Assert\Length(
     *     min=3,
     *     max=100,
     *     minMessage="O sobrenome deve ter pelo menos 3 caracteres"
     * )
     */
    private string $surname;

    /**
     * @ORM\Column(type="text", length=100)
     * @Assert\NotBlank(message="O e-mail é obrigatório")
     * @Assert\Length(
     *     min=3,
     *     max=100,
     *     minMessage="Endereço incorreto"
     * )
     */
    private string $email;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User_Contact_Phone", mappedBy="user", cascade={"all"})
     */
    private User_Contact_Phone $phonenumbers;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User_Address", cascade={"all"})
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private User_Address $address;

    /**
     *  @ORM\Column(type="datetime")
     */
    private \DateTime $createdAt;

    /**
     *  @ORM\Column(type="datetime", nullable = true)
     */
    private \DateTime $updatedAt;

    //GETs e SETs

    public function getIdUser(): int
    {
        return $this->id;
    }
    
    //GET e SET para NAME
    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->updatedAt = new \DateTime();
        $this->name = $name;
    }

    //GET e SET para SURNAME
    public function getSurname(): string
    {
        return $this->surname;
    }
    public function setSurname(string $surname): void
    {
        $this->updatedAt = new \DateTime();
        $this->surname = $surname;
    }

    //GET e SET para EMAIL
    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $email): void
    {
        $this->updatedAt = new \DateTime();
        $this->email = $email;
    }

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->phonenumber = new ArrayCollection();
    }

    public function getPhonenumber()
    {
        return $this->phonenumbers;
    }
    public function addPhoneNumber(User_Contact_Phone $phonenumber)
    {
        $this->phonenumbers[] = $phonenumber;
    }

    //GET e SET para ADDRESS
    public function getAddress(): User_Address
    {
        return $this->address;
    }
    public function setAddress(User_Address $address): void
    {
        $this->address = $address;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
}