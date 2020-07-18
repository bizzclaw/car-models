<?php

namespace App\Entity;

use App\Repository\ModelRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModelRepository::class)
 */
class Model
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=VehicleType::class, inversedBy="models")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Make::class, inversedBy="models")
     */
    private $make;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $makeCode;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getType(): ?VehicleType
    {
        return $this->type;
    }

    public function setType(?VehicleType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getMake(): ?Make
    {
        return $this->make;
    }

    public function setMake(?Make $make): self
    {
        $this->make = $make;

        return $this;
    }

    public function getMakeCode(): ?string
    {
        return $this->makeCode;
    }

    public function setMakeCode(?string $makeCode): self
    {
        $this->makeCode = $makeCode;

        return $this;
    }

    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'makeCode' => $this->getMakeCode(),
            'description' => $this->getDescription(),
        ];
    }
}
