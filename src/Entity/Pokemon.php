<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PokemonRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=PokemonRepository::class)
 * @ApiResource
 */
class Pokemon
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups("get:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=80)
     * @Groups("get:read")
     * @ApiFilter(SearchFilter::class, strategy="partial")
     */
    private $nom;

    /**
     * @ORM\Column(type="integer")
     * @Groups("get:read")
     */
    private $ptvie;

    /**
     * @ORM\Column(type="integer")
     * @Groups("get:read")
     */
    private $ptdegat;

    /**
     * @ORM\Column(type="date")
     * @Groups("get:read")
     */
    private $created;

    /**
     * @ORM\Column(type="array")
     * @Groups("get:read")
     */
    private $types = [];

    /**
     * @ORM\Column(type="string", length=400)
     * @Groups("get:read")
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPtvie(): ?int
    {
        return $this->ptvie;
    }

    public function setPtvie(int $ptvie): self
    {
        $this->ptvie = $ptvie;

        return $this;
    }

    public function getPtdegat(): ?int
    {
        return $this->ptdegat;
    }

    public function setPtdegat(int $ptdegat): self
    {
        $this->ptdegat = $ptdegat;

        return $this;
    }
    
    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getTypes(): ?array
    {
        return $this->types;
    }

    public function setTypes(array $types): self
    {
        $this->types = $types;

        return $this;
    }

    public function __toString(): string
    {
        return $this->nom;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
