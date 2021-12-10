<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class KetchupController extends AbstractController
{
    #[Route('/ketchup', name: 'ketchup')]
    public function index(): Response
    {
        return $this->render('ketchup/ketchup.html.twig', [
            'controller_name' => 'KetchupController',
        ]);
    }
}
