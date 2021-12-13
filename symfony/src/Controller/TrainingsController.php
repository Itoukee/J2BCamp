<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrainingsController extends AbstractController
{
    #[Route('/trainings', name: 'trainings')]
    public function index(): Response
    {
        return $this->render('trainings/index.html.twig', [
            'controller_name' => 'TrainingsController',
        ]);
    }
}
