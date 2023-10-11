<?php

namespace App\Entity;

use App\Repository\CameraRollSizeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: CameraRollSizeRepository::class)]
class CameraRollSize
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $size = null;

    #[Gedmo\Timestampable(on: 'create')]
    #[ORM\Column(name: 'created', type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $created = null;

    #[Gedmo\Timestampable(on: 'update')]
    #[ORM\Column(name: 'updated', nullable: true, type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $updated = null;

    #[ORM\OneToMany(mappedBy: 'size', targetEntity: CameraRoll::class)]
    private Collection $cameraRolls;

    public function __construct()
    {
        $this->cameraRolls = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(?int $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): static
    {
        $this->created = $created;

        return $this;
    }

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    public function setUpdated(?\DateTimeInterface $updated): static
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * @return Collection<int, CameraRoll>
     */
    public function getCameraRolls(): Collection
    {
        return $this->cameraRolls;
    }

    public function addCameraRoll(CameraRoll $cameraRoll): static
    {
        if (!$this->cameraRolls->contains($cameraRoll)) {
            $this->cameraRolls->add($cameraRoll);
            $cameraRoll->setSize($this);
        }

        return $this;
    }

    public function removeCameraRoll(CameraRoll $cameraRoll): static
    {
        if ($this->cameraRolls->removeElement($cameraRoll)) {
            // set the owning side to null (unless already changed)
            if ($cameraRoll->getSize() === $this) {
                $cameraRoll->setSize(null);
            }
        }

        return $this;
    }
}
