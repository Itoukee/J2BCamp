<?php

namespace App\Controller;

use App\Repository\ComedianDocumentsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class KetchupController extends AbstractController
{
    #[Route('/ketchup', name: 'ketchup')]
    public function index(ComedianDocumentsRepository $comedianDocumentsRepository): Response
    {
        return $this->render('ketchup/ketchup.html.twig', [
            "paid" => $comedianDocumentsRepository->findBy(["paid" => true]),
            "not_paid" => $comedianDocumentsRepository->findBy(["paid" => false])
        ]);
    }
}
