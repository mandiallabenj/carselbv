<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CarMakeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource()]
#[ORM\Entity(repositoryClass: CarMakeRepository::class)]
class CarMake
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $carMake = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCarMake(): ?string
    {
        return $this->carMake;
    }

    public function setCarMake(string $carMake): self
    {
        $this->carMake = $carMake;

        return $this;
    }
}
