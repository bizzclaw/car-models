<?php

namespace App\Entity;

use App\Repository\SearchLogRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SearchLogRepository::class)
 */
class SearchLog
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=VehicleType::class)
     */
    private $vehicleType;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $makeAbbr;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $requestTime;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ipAddress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $userAgent;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVehicleType(): ?VehicleType
    {
        return $this->vehicleType;
    }

    public function setVehicleType(?VehicleType $vehicleType): self
    {
        $this->vehicleType = $vehicleType;

        return $this;
    }

    public function getMakeAbbr(): ?string
    {
        return $this->makeAbbr;
    }

    public function setMakeAbbr(?string $makeAbbr): self
    {
        $this->makeAbbr = $makeAbbr;

        return $this;
    }

    public function getRequestTime(): ?int
    {
        return $this->requestTime;
    }

    public function setRequestTime(?int $requestTime): self
    {
        $this->requestTime = $requestTime;

        return $this;
    }

    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    public function setIpAddress(?string $ipAddress): self
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    public function getUserAgent(): ?string
    {
        return $this->userAgent;
    }

    public function setUserAgent(?string $userAgent): self
    {
        $this->userAgent = $userAgent;

        return $this;
    }
}
