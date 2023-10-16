<?php

namespace App\Entity;

use App\Repository\CameraRollSizeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CameraRollSizeRepository::class)]
class CameraRollSize extends AbstractEntity
{

    #[ORM\Column(nullable: true)]
    private ?int $size = null;

    #[ORM\OneToMany(mappedBy: 'size', targetEntity: CameraRoll::class)]
    private Collection $cameraRolls;

    public function __construct()
    {
        $this->cameraRolls = new ArrayCollection();
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
