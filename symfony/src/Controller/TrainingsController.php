<?php

namespace App\Controller;

use App\Entity\Trainings;
use App\Form\TrainingType;
use App\Form\UserType;
use App\Repository\BillsRepository;
use App\Repository\TrainingsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/trainings/add', name: "training_add")]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $training = new Trainings();
        $form = $this->createForm(TrainingType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $training = $form->getData();
            $entityManager->persist($training);
            $entityManager->flush();
            return $this->redirect($this->generateUrl('poulet_frit'));
        }
        return $this->render("trainings/create.html.twig", [
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
