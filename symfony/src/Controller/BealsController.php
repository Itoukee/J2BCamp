<?php

namespace App\Controller;

use App\Entity\Bills;
use App\Entity\Trainings;
use App\Form\BillType;
use App\Form\TrainingType;
use App\Repository\TrainingsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BealsController extends AbstractController
{
    #[Route('/bills/add', name: "bills_add")]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $bill = new Bills();
        $form = $this->createForm(BillType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $bill = $form->getData();
            $entityManager->persist($bill);
            $entityManager->flush();
            return $this->redirect($this->generateUrl('poulet_frit'));
        }
        return $this->render("beals/create.html.twig", [
            "form" => $form->createView()
        ]);
    }

    #[Route('/trainings/show/{id}', name: "training_show")]
    public function show(int $id, TrainingsRepository $trainingsRepository)
    {
        $training = $trainingsRepository->find($id);

        return $this->render("trainings/show.html.twig", [
            "training" => $training,
        ]);
    }

}
