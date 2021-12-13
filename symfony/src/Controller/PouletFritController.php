<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PouletFritController extends AbstractController
{
    #[Route('/poulet_frit', name: 'poulet_frit')]
    public function index(): Response
    {
        return $this->render('poulet_frit/poulet_frit.html.twig', [
            'controller_name' => 'PouletFritController',
        ]);
    }
}
