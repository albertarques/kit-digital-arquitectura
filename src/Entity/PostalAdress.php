<?php

namespace App\Entity;

use App\Repository\PostalAdressRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostalAdressRepository::class)]
class PostalAdress extends AbstractEntity
{

    #[ORM\ManyToOne(inversedBy: 'postalAdresses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $client_id = null;

    #[ORM\Column(length: 255)]
    private ?string $street_adress = null;

    #[ORM\Column(length: 255)]
    private ?string $town = null;

    #[ORM\Column(length: 20)]
    private ?string $postal_code = null;

    #[ORM\Column(length: 255)]
    private ?string $province = null;

    #[ORM\Column(length: 255)]
    private ?string $country = null;

    public function getClientId(): ?Client
    {
        return $this->client_id;
    }

    public function setClientId(?Client $client_id): static
    {
        $this->client_id = $client_id;

        return $this;
    }

    public function getStreetAdress(): ?string
    {
        return $this->street_adress;
    }

    public function setStreetAdress(string $street_adress): static
    {
        $this->street_adress = $street_adress;

        return $this;
    }

    public function getTown(): ?string
    {
        return $this->town;
    }

    public function setTown(string $town): static
    {
        $this->town = $town;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postal_code;
    }

    public function setPostalCode(string $postal_code): static
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    public function getProvince(): ?string
    {
        return $this->province;
    }

    public function setProvince(string $province): static
    {
        $this->province = $province;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }
}
