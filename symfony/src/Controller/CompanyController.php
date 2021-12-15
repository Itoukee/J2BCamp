<?php

namespace App\Controller;

use App\Entity\Companies;
use App\Form\CompanyFormType;
use App\Repository\CompaniesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompanyController extends AbstractController
{


    #[Route('/company/add', name: 'app_company_add')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $company = new Companies();
        $form = $this->createForm(CompanyFormType::class, $company);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($company);
            $entityManager->flush();

            return $this->redirectToRoute('app_company_show', ["id" => $company->getId()]);
        }

        return $this->render('company/create.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route('/company/edit/{id}', name: 'app_company_edit')]
    public function edit(int $id, Request $request, CompaniesRepository $companiesRepository, EntityManagerInterface $entityManager): Response
    {
        $company = $companiesRepository->find($id);
        $form = $this->createForm(CompanyFormType::class, $company);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $company = $form->getData();
            $entityManager->persist($company);
            $entityManager->flush();

            return $this->redirectToRoute('app_company_show', ["id" => $company->getId()]);
        }

        return $this->render('company/edit.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route('/company/show/{id}', name: 'app_company_show')]
    public function show(int $id, CompaniesRepository $companiesRepository): Response
    {
        $company = $companiesRepository->find($id);
        return $this->render('company/show.html.twig', [
            'company' => $company,
        ]);
    }
}
