<?php

namespace App\Controller;

use App\Repository\CompaniesRepository;
use App\Repository\TrainingsRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PouletFritController extends AbstractController
{
    #[Route('/poulet_frit', name: 'poulet_frit')]
    public function index(UserRepository $userRepository, CompaniesRepository $companiesRepository, TrainingsRepository $trainingsRepository): Response
    {
        return $this->render('poulet_frit/poulet_frit.html.twig', [
            'controller_name' => 'PouletFritController',
            'comedians' => $userRepository->filterByRole("comedian"),
            'clients' => $companiesRepository->findAll(),
            'formations' => $trainingsRepository->findAll()
        ]);
    }
}
