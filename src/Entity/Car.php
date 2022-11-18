<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CarRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource()]
#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?int $model_year = null;

    #[ORM\Column(length: 255)]
    private ?string $car_condition = null;

    #[ORM\Column(nullable: true)]
    private ?int $price = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $location = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(length: 255)]
    private ?string $carFilename = null;

    #[ORM\ManyToOne(inversedBy: 'cars')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'cars')]
    private ?CarMake $carmake = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getModelYear(): ?int
    {
        return $this->model_year;
    }

    public function setModelYear(int $model_year): self
    {
        $this->model_year = $model_year;

        return $this;
    }

    public function getCarCondition(): ?string
    {
        return $this->car_condition;
    }

    public function setCarCondition(string $car_condition): self
    {
        $this->car_condition = $car_condition;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCarFilename(): ?string
    {
        return $this->carFilename;
    }

    public function setCarFilename(string $carFilename): self
    {
        $this->carFilename = $carFilename;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCarmake(): ?CarMake
    {
        return $this->carmake;
    }

    public function setCarmake(?CarMake $carmake): self
    {
        $this->carmake = $carmake;

        return $this;
    }
}
