<?php

namespace App\Entity;

use App\Repository\FegRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FegRepository::class)
 */
class Feg
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $g;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getG(): ?string
    {
        return $this->g;
    }

    public function setG(string $g): self
    {
        $this->g = $g;

        return $this;
    }
}
