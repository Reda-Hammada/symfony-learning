<?php

namespace App\Entity;

use App\Repository\ProductEntityRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Mapping\ClassMetadata;


#[ORM\Entity(repositoryClass: ProductEntityRepository::class)]
class ProductEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $product_name = null;

    #[ORM\Column]
    private ?int $price = null;
    
    #[ORM\Column(length:255)]
    private ?string $description = null;
    
    #[ORM\Column]
    private ?int $quantity = null ;
    
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName(): ?string
    {
        return $this->product_name;
    }

    public function setProductName(string $product_name): self
    {
        $this->product_name = $product_name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description ): self
    {
            $this->description = $description;
            return $this;
    }

    public function getQuantity(): ?int {
        
        return $this->quantity;
        
    }

    public function setQuantity(int $quantity): self
     {
        $this->quantity = $quantity;
        return $this;
     }


     public static function loadValidator(ClassMetadata $metadata):void
     {
        $metadata->addPropertyConstraint('product_name', new NotBlank());
        
     }
}   