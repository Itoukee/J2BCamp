<?php

namespace App\Controller;

use App\Entity\Trainings;
use App\Form\CompanyFormType;
use App\Form\TrainingType;
use App\Form\UserType;
use App\Repository\BillsRepository;
use App\Repository\CompaniesRepository;
use App\Repository\TrainingsRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrainingsController extends AbstractController
{

    #[Route('/trainings/add', name: "app_training_add")]
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

    #[Route('/trainings/edit/{id}', name: 'app_training_edit')]
    public function edit(int $id, Request $request, TrainingsRepository $trainingsRepository, EntityManagerInterface $entityManager): Response
    {
        $training = $trainingsRepository->find($id);
        $form = $this->createForm(TrainingType::class, $training);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $training = $form->getData();
            $entityManager->persist($training);
            $entityManager->flush();

            return $this->redirectToRoute('app_training_show', ["id" => $training->getId()]);
        }

        return $this->render('trainings/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/trainings/show/{id}', name: "app_training_show")]
    public function show(int $id, TrainingsRepository $trainingsRepository)
    {
        $training = $trainingsRepository->find($id);

        return $this->render("trainings/show.html.twig", [
            "training" => $training,
        ]);
    }

    #[Route('/trainings/delete/{id}', name: 'app_training_delete')]
    public function delete(int $id, Request $request, TrainingsRepository $trainingsRepository, EntityManagerInterface $entityManager)
    {
        $training = $trainingsRepository->find($id);
        $entityManager->remove($training);
        $entityManager->flush();
        return $this->redirectToRoute("poulet_frit");
    }


}
