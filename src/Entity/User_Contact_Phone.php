<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 */
class User_Contact_Phone
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    private int $id;

    /**
     * @ORM\Column(type="integer", length=2)
     * @Assert\NotBlank(message="O código de área é obrigatório")
     * @Assert\Length(
     *     min=3,
     *     max=100,
     *     minMessage="O código de área deve ter pelo menos 2 caracteres"
     * )
     */
    private string $areacode;

    /**
     * @ORM\Column(type="integer", length=9)
     * @Assert\NotBlank(message="O telefone é obrigatório")
     * @Assert\Length(
     *     min=3,
     *     max=9,
     *     minMessage="O telefone deve ter pelo menos 8 caracteres"
     * )
     */
    private string $phonenumber;

    /**
     *  @ORM\Column(type="datetime")
     */
    private \DateTime $createdAt;

    public function getIdContact(): int
    {
        return $this->id;
    }

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

    //GET e SET para AREACODE
    public function getAreaCode(): int
    {
        return $this->areacode;
    }
    public function setAreaCode(string $areacode): void
    {
        $this->updatedAt = new \DateTime();
        $this->areacode = $areacode;
    }

    //GET e SET para PHONENUMBER
    public function getPhoneNumber(): int
    {
        return $this->phonenumber;
    }
    public function setPhoneNumber(int $phonenumber): void
    {
        $this->updatedAt = new \DateTime();
        $this->phonenumber = $phonenumber;
    }  
}
