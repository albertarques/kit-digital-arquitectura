<?php

namespace App\Entity;

use App\Repository\ShipmentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: ShipmentRepository::class)]
class Shipment extends AbstractEntity
{

    #[ORM\OneToOne(inversedBy: 'shipment', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?CameraRoll $camera_roll_id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $state = null;

    #[ORM\Column(nullable: true)]
    private ?int $price = null;

    public function getCameraRollId(): ?CameraRoll
    {
        return $this->camera_roll_id;
    }

    public function setCameraRollId(CameraRoll $camera_roll_id): static
    {
        $this->camera_roll_id = $camera_roll_id;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): static
    {
        $this->state = $state;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): static
    {
        $this->price = $price;

        return $this;
    }

}
