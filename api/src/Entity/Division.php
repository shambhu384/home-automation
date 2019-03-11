<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ApiResource(
 *     normalizationContext={"groups"={"read", "gpio:read", "gpio"}},
 *     denormalizationContext={"groups"={"write", "gpio:write", "gpio"}}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\DivisionRepository")
 */
class Division
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read", "write"})
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Gpio", mappedBy="division")
     * @ApiSubresource(maxDepth=1)
     * @Groups({"gpio:read"})
     */
    private $gpios;

    public function __construct()
    {
        $this->gpios = new ArrayCollection();
    }

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

    /**
     * @return Collection|Gpio[]
     */
    public function getGpios(): Collection
    {
        return $this->gpios;
    }

    public function addGpio(Gpio $gpio): self
    {
        if (!$this->gpios->contains($gpio)) {
            $this->gpios[] = $gpio;
            $gpio->setDivision($this);
        }

        return $this;
    }

    public function removeGpio(Gpio $gpio): self
    {
        if ($this->gpios->contains($gpio)) {
            $this->gpios->removeElement($gpio);
            // set the owning side to null (unless already changed)
            if ($gpio->getDivision() === $this) {
                $gpio->setDivision(null);
            }
        }

        return $this;
    }
}
