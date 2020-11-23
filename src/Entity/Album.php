<?php

namespace App\Entity;

use App\Repository\AlbumRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AlbumRepository::class)
 */
class Album
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imageFrontCover;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imageBackCover;

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

    public function getImageFrontCover(): ?string
    {
        return $this->imageFrontCover;
    }

    public function setImageFrontCover(string $imageFrontCover): self
    {
        $this->imageFrontCover = $imageFrontCover;

        return $this;
    }

    public function getImageBackCover(): ?string
    {
        return $this->imageBackCover;
    }

    public function setImageBackCover(string $imageBackCover): self
    {
        $this->imageBackCover = $imageBackCover;

        return $this;
    }
}
