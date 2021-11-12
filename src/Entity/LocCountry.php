<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LocCountry
 *
 * @ORM\Table(name="loc_country", indexes={@ORM\Index(name="name", columns={"name"})})
 * @ORM\Entity
 */
class LocCountry
{
    /**
     * @var int
     *
     * @ORM\Column(name="country_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $countryId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="short_name", type="string", length=50, nullable=true)
     */
    private $shortName;

    public function getCountryId(): ?int
    {
        return $this->countryId;
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

    public function getShortName(): ?string
    {
        return $this->shortName;
    }

    public function setShortName(?string $shortName): self
    {
        $this->shortName = $shortName;

        return $this;
    }


}
