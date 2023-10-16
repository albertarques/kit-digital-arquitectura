<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client extends AbstractEntity
{

    #[ORM\Column(length: 255)]
    private ?string $username = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $surname = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $active = null;

    #[ORM\OneToMany(mappedBy: 'client_id', targetEntity: PostalAdress::class)]
    private Collection $postalAdresses;

    #[ORM\OneToMany(mappedBy: 'client_id', targetEntity: CameraRoll::class)]
    private Collection $cameraRolls;

    public function __construct()
    {
        $this->postalAdresses = new ArrayCollection();
        $this->cameraRolls = new ArrayCollection();
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): static
    {
        $this->surname = $surname;

        return $this;
    }

    public function getActive(): ?int
    {
        return $this->active;
    }

    public function setActive(int $active): static
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return Collection<int, PostalAdress>
     */
    public function getPostalAdresses(): Collection
    {
        return $this->postalAdresses;
    }

    public function addPostalAdress(PostalAdress $postalAdress): static
    {
        if (!$this->postalAdresses->contains($postalAdress)) {
            $this->postalAdresses->add($postalAdress);
            $postalAdress->setClientId($this);
        }

        return $this;
    }

    public function removePostalAdress(PostalAdress $postalAdress): static
    {
        if ($this->postalAdresses->removeElement($postalAdress)) {
            // set the owning side to null (unless already changed)
            if ($postalAdress->getClientId() === $this) {
                $postalAdress->setClientId(null);
            }
        }

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
            $cameraRoll->setClientId($this);
        }

        return $this;
    }

    public function removeCameraRoll(CameraRoll $cameraRoll): static
    {
        if ($this->cameraRolls->removeElement($cameraRoll)) {
            // set the owning side to null (unless already changed)
            if ($cameraRoll->getClientId() === $this) {
                $cameraRoll->setClientId(null);
            }
        }

        return $this;
    }
}
