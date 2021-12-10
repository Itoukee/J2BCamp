<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BealsController extends AbstractController
{
    #[Route('/beals', name: 'beals')]
    public function index(): Response
    {
        return $this->render('beals/beals.html.twig', [
            'controller_name' => 'BealsController',
        ]);
    }
}
