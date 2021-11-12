<?php

namespace App\Controller;

use App\Service\AppService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
	/**
	 * @Route("/partners", name="partner", methods={"GET"})
	 * @param \App\Service\AppService $appService
	 * @return \Symfony\Component\HttpFoundation\JsonResponse
	 */
	public function partners(AppService $appService): JsonResponse
	{
		return $this->json($appService->getPartners());
	}

	/**
	 * @Route("/board_params", name="board_params", methods={"GET"})
	 */
	public function boardParams(AppService $appService): JsonResponse
	{
		return $this->json($appService->getBoardParams());
	}
}
