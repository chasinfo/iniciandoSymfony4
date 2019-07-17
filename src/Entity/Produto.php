<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProdutoRepository")
 */
class Produto
{
    /**
     * @var integer
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @var string
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="O preenchimento deste campo é obrigatório")
     */
    private $name;
    /**
     * @var double
     * @ORM\Column(type="decimal", precision=5, scale=2)
     * @Assert\NotBlank(message="O preenchimento deste campo é obrigatório")
     */
    private $price;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Produto
     */
    public function setId(int $id): Produto
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Produto
     */
    public function setName(string $name): Produto
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return Produto
     */
    public function setPrice(float $price): Produto
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Produto
     */
    public function setDescription(string $description = null): Produto
    {
        $this->description = $description;
        return $this;
    }


}
