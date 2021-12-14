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
    #[Route('/company', name: 'company')]
    public function index(): Response
    {
        return $this->render('company/index.html.twig', [
            'controller_name' => 'CompanyController',
        ]);
    }

    #[Route('/company/add', name: 'app_company_add')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $company = new Companies();
        $form = $this->createForm(CompanyFormType::class, $company);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($company);
            $entityManager->flush();

            return $this->redirectToRoute('company_show', ["id" => $company->getId()]);
        }

        return $this->render('registration/register_company.html.twig', [
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
