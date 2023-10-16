<?php

namespace App\Entity;

use App\Repository\CameraRollTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CameraRollTypeRepository::class)]
class CameraRollType extends AbstractEntity
{

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: CameraRoll::class)]
    private Collection $cameraRolls;

    public function __construct()
    {
        $this->cameraRolls = new ArrayCollection();
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
            $cameraRoll->setType($this);
        }

        return $this;
    }

    public function removeCameraRoll(CameraRoll $cameraRoll): static
    {
        if ($this->cameraRolls->removeElement($cameraRoll)) {
            // set the owning side to null (unless already changed)
            if ($cameraRoll->getType() === $this) {
                $cameraRoll->setType(null);
            }
        }

        return $this;
    }
}
