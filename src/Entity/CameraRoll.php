<?php

namespace App\Entity;

use App\Repository\CameraRollRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CameraRollRepository::class)]
class CameraRoll extends AbstractEntity
{

    #[ORM\ManyToOne(inversedBy: 'cameraRolls')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $client_id = null;

    #[ORM\Column]
    private ?int $shipment_id = null;

    #[ORM\OneToOne(mappedBy: 'camera_roll_id', cascade: ['persist', 'remove'])]
    private ?Shipment $shipment = null;

    #[ORM\OneToMany(mappedBy: 'camera_roll', targetEntity: Photo::class)]
    private Collection $photos;

    #[ORM\ManyToOne(inversedBy: 'cameraRolls')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CameraRollSize $size = null;

    #[ORM\ManyToOne(inversedBy: 'cameraRolls')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CameraRollPaperSize $paper_size = null;

    #[ORM\ManyToOne(inversedBy: 'cameraRolls')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CameraRollType $type = null;

    public function __construct()
    {
        $this->photos = new ArrayCollection();
    }

    public function getClientId(): ?Client
    {
        return $this->client_id;
    }

    public function setClientId(?Client $client_id): static
    {
        $this->client_id = $client_id;

        return $this;
    }

    public function getShipmentId(): ?int
    {
        return $this->shipment_id;
    }

    public function setShipmentId(int $shipment_id): static
    {
        $this->shipment_id = $shipment_id;

        return $this;
    }

    public function getShipment(): ?Shipment
    {
        return $this->shipment;
    }

    public function setShipment(Shipment $shipment): static
    {
        // set the owning side of the relation if necessary
        if ($shipment->getCameraRollId() !== $this) {
            $shipment->setCameraRollId($this);
        }

        $this->shipment = $shipment;

        return $this;
    }

    /**
     * @return Collection<int, Photo>
     */
    public function getPhotos(): Collection
    {
        return $this->photos;
    }

    public function addPhoto(Photo $photo): static
    {
        if (!$this->photos->contains($photo)) {
            $this->photos->add($photo);
            $photo->setCameraRoll($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): static
    {
        if ($this->photos->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getCameraRoll() === $this) {
                $photo->setCameraRoll(null);
            }
        }

        return $this;
    }

    public function getSize(): ?CameraRollSize
    {
        return $this->size;
    }

    public function setSize(?CameraRollSize $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function getPaperSize(): ?CameraRollPaperSize
    {
        return $this->paper_size;
    }

    public function setPaperSize(?CameraRollPaperSize $paper_size): static
    {
        $this->paper_size = $paper_size;

        return $this;
    }

    public function getType(): ?CameraRollType
    {
        return $this->type;
    }

    public function setType(?CameraRollType $type): static
    {
        $this->type = $type;

        return $this;
    }

}
