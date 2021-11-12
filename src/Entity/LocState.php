<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LocState
 *
 * @ORM\Table(name="loc_state", indexes={@ORM\Index(name="country_id", columns={"country_id"})})
 * @ORM\Entity
 */
class LocState
{
    /**
     * @var int
     *
     * @ORM\Column(name="state_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $stateId;

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

    /**
     * @var int
     *
     * @ORM\Column(name="country_id", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $countryId;

    public function getStateId(): ?int
    {
        return $this->stateId;
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

    public function getCountryId(): ?int
    {
        return $this->countryId;
    }

    public function setCountryId(int $countryId): self
    {
        $this->countryId = $countryId;

        return $this;
    }


}
