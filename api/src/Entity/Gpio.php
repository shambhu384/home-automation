<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ApiResource(
 *     messenger=true,
 *     collectionOperations={
 *         "post"={"status"=202}
 *     },
 *     output=false
 * )
 * @ORM\Entity(repositoryClass="App\Repository\GpioRepository")
 * @UniqueEntity("port")
 */
class Gpio
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"gpio"})
     */
    private $name;

    /**
     * @ORM\Column(type="integer", unique=true)
     * @Groups({"gpio"})
     */
    private $port;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"gpio"})
     */
    private $state;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"gpio"})
     */
    private $lastUpdate;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Division", inversedBy="gpios")
     */
    private $division;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPort(): ?int
    {
        return $this->port;
    }

    public function setPort(int $port): self
    {
        $this->port = $port;

        return $this;
    }

    public function getState(): ?int
    {
        return $this->state;
    }

    public function setState(int $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getLastUpdate(): ?\DateTimeInterface
    {
        return $this->lastUpdate;
    }

    public function setLastUpdate(\DateTimeInterface $lastUpdate): self
    {
        $this->lastUpdate = $lastUpdate;

        return $this;
    }

    public function getDivision(): ?Division
    {
        return $this->division;
    }

    public function setDivision(?Division $division): self
    {
        $this->division = $division;

        return $this;
    }
}
