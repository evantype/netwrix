<?php

namespace App\Service;

use App\Repository\LocCountryRepository;
use App\Repository\LocStateRepository;
use App\Repository\PartnerLocatorRepository;

class AppService
{
	/**
	 * @var \App\Repository\PartnerLocatorRepository
	 */
	private PartnerLocatorRepository $partnerRepo;
	/**
	 * @var \App\Repository\LocCountryRepository
	 */
	private LocCountryRepository $locCountryRepository;
	/**
	 * @var \App\Repository\LocStateRepository
	 */
	private LocStateRepository $locStateRepository;

	public function __construct(
		PartnerLocatorRepository $partnerLocatorRepository,
		LocCountryRepository $locCountryRepository,
		LocStateRepository $locStateRepository
	) {
		$this->partnerRepo = $partnerLocatorRepository;
		$this->locCountryRepository = $locCountryRepository;
		$this->locStateRepository = $locStateRepository;
	}

	public function getPartners(): array
	{
		return $this->partnerRepo->findAll();
	}

	public function getBoardParams(): array
	{
		$countries = $this->locCountryRepository->findAll();
		$states = $this->locStateRepository->findAll();

		return [
			'countries' => $countries,
			'states' => $states
		];
	}
}