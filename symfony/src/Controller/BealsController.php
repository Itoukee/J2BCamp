<?php

namespace App\Controller;

use App\Entity\Bills;
use App\Entity\Trainings;
use App\Form\BillType;
use App\Form\CompanyFormType;
use App\Form\TrainingType;
use App\Repository\BillsRepository;
use App\Repository\CompaniesRepository;
use App\Repository\TrainingsRepository;
use App\Service\BillGenerator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BealsController extends AbstractController
{
    #[Route('/bills/client/add', name: "bills_client_add")]
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

    #[Route('/bills/edit/{id}', name: 'bills_client_edit')]
    public function edit(int $id, Request $request, BillsRepository $billsRepository, EntityManagerInterface $entityManager): Response
    {
        $bill = $billsRepository->find($id);
        $form = $this->createForm(BillType::class, $bill);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $bill = $form->getData();
            $entityManager->persist($bill);
            $entityManager->flush();

            return $this->redirectToRoute('bills_client_show', ["id" => $bill->getId()]);
        }

        return $this->render('beals/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/bills/client', name: "bills_client_index")]
    public function index(BillsRepository $billsRepository): Response
    {

        return $this->render("beals/index.html.twig", [
            "paid" => $billsRepository->findBy(["paid" => 1]),
            "not_paid" => $billsRepository->findBy(["paid" => 0])
        ]);
    }

    #[Route('/bills/client/show/{id}', name: "bills_client_show")]
    public function show(int $id, BillsRepository $billsRepository)
    {
        $bill = $billsRepository->find($id);

        return $this->render("beals/show.html.twig", [
            "bill" => $bill,
        ]);
    }

    /**
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    #[Route('/bills/client/generate/{id}', name: "bills_client_generate")]
    public function generate(int $id, BillsRepository $billsRepository, BillGenerator $billGenerator)
    {
        $bill = $billsRepository->find($id);
        $billGenerator->generatePdf($bill);
    }


}
