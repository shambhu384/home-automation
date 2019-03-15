<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

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
 * @Vich\Uploadable
 * @ORM\HasLifecycleCallbacks()
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Division", inversedBy="gpios")
     */
    private $division;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"gpio"})
     */
    private $turnOnIcon;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"gpio"})
     */
    private $turnOffIcon;

    /**
     * @var File
     * @Vich\UploadableField(mapping="gpio_images", fileNameProperty="turnOnIcon")
     */
    public $turnOnIconFile;

    /**
     * @var File
     * @Vich\UploadableField(mapping="gpio_images", fileNameProperty="turnOffIcon")
     */
    public $turnOffIconFile;

     /**
     * @ORM\Column(type="datetime")
     * @Groups({"gpio"})
     */
    private $lastUpdate;

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

    public function getTurnOnIcon(): ?string
    {
        return $this->turnOnIcon;
    }

    public function setTurnOnIcon(string $turnOnIcon = null): self
    {
        $this->turnOnIcon = $turnOnIcon;

        return $this;
    }

    public function getTurnOffIcon(): ?string
    {
        return $this->turnOffIcon;
    }

    public function setTurnOffIcon(string $turnOffIcon = null): self
    {
        $this->turnOffIcon = $turnOffIcon;

        return $this;
    }

    /**
     * Get turnOnIconFile.
     *
     * @return turnOnIconFile.
     */
    public function getTurnOnIconFile()
    {
        return $this->turnOnIconFile;
    }

    /**
     * Set turnOnIconFile.
     *
     * @param turnOnIconFile the value to set.
     */
    public function setTurnOnIconFile(File $turnOnIconFile = null)
    {
        $this->turnOnIconFile = $turnOnIconFile;
        $this->turnOnIcon = $turnOnIconFile->getFilename();
    }

    /**
     * Get turnOffIconFile.
     *
     * @return turnOffIconFile.
     */
    public function getTurnOffIconFile()
    {
        return $this->turnOffIconFile;
    }

    /**
     * Set turnOffIconFile.
     *
     * @param turnOffIconFile the value to set.
     */
    public function setTurnOffIconFile(File $turnOffIconFile =null)
    {
        $this->turnOffIconFile = $turnOffIconFile;
        $this->turnOffIcon = $turnOffIconFile->getFilename();

    }

        /**
     * Pre persist event listener
     *
     * @ORM\PrePersist
     */
    public function beforeSave()
    {
        $this->lastUpdate = new \DateTime('now', new \DateTimeZone('UTC'));
    }
    /**
     * Pre update event handler
     *
     * @ORM\PreUpdate
     */
    public function doPreUpdate()
    {
        $this->lastUpdate = new \DateTime('now', new \DateTimeZone('UTC'));
    }
}
