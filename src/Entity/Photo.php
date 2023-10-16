<?php

namespace App\Entity;

use App\Repository\PhotoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhotoRepository::class)]
class Photo extends AbstractEntity
{
    #[ORM\ManyToOne(inversedBy: 'photos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CameraRoll $camera_roll = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image_name = null;

    public function getCameraRoll(): ?CameraRoll
    {
        return $this->camera_roll;
    }

    public function setCameraRoll(?CameraRoll $camera_roll): static
    {
        $this->camera_roll = $camera_roll;

        return $this;
    }

    public function getImageName(): ?string
    {
        return $this->image_name;
    }

    public function setImageName(?string $image_name): static
    {
        $this->image_name = $image_name;

        return $this;
    }
}
