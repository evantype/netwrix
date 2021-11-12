<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PartnerLocator
 *
 * @ORM\Table(name="partner_locator")
 * @ORM\Entity
 */
class PartnerLocator
{
	/**
	 * @var int
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="company", type="string", length=255, nullable=false)
	 */
	private $company;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="status", type="string", length=255, nullable=false)
	 */
	private $status;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="logo", type="string", length=255, nullable=false)
	 */
	private $logo;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="address", type="string", length=255, nullable=false)
	 */
	private $address;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="website", type="string", length=255, nullable=false)
	 */
	private $website;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="phone", type="string", length=40, nullable=false)
	 */
	private $phone;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="countries_covered", type="string", length=1000, nullable=false)
	 */
	private $countriesCovered;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="states_covered", type="string", length=1000, nullable=false)
	 */
	private $statesCovered;

	public function getId(): ?int
	{
		return $this->id;
	}

	public function getCompany(): ?string
	{
		return $this->company;
	}

	public function setCompany(string $company): self
	{
		$this->company = $company;

		return $this;
	}

	public function getStatus(): ?string
	{
		return $this->status;
	}

	public function setStatus(string $status): self
	{
		$this->status = $status;

		return $this;
	}

	public function getLogo(): ?string
	{
		return $this->logo;
	}

	public function setLogo(string $logo): self
	{
		$this->logo = $logo;

		return $this;
	}

	public function getAddress(): ?string
	{
		return $this->address;
	}

	public function setAddress(string $address): self
	{
		$this->address = $address;

		return $this;
	}

	public function getWebsite(): ?string
	{
		return $this->website;
	}

	public function setWebsite(string $website): self
	{
		$this->website = $website;

		return $this;
	}

	public function getPhone(): ?string
	{
		return $this->phone;
	}

	public function setPhone(string $phone): self
	{
		$this->phone = $phone;

		return $this;
	}

	public function getCountriesCovered(): ?string
	{
		return $this->countriesCovered;
	}

	public function setCountriesCovered(string $countriesCovered): self
	{
		$this->countriesCovered = $countriesCovered;

		return $this;
	}

	public function getStatesCovered(): ?string
	{
		return $this->statesCovered;
	}

	public function setStatesCovered(string $statesCovered): self
	{
		$this->statesCovered = $statesCovered;

		return $this;
	}
}
