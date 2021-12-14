<?php

namespace App\Controller;

use App\Entity\Companies;
use App\Entity\User;
use App\Form\CompanyFormType;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route('/register/user', name: 'app_register_user')]
    public function register_user(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
            $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('profile_show',["id"=>$user->getId()]);
        }

        return $this->render('registration/register_user.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
    #[Route('/register/company', name: 'app_register_company')]
    public function register_company(Request $request,EntityManagerInterface $entityManager): Response
    {
        $company = new Companies();
        $form = $this->createForm(CompanyFormType::class, $company);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($company);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('company_show',["id"=>$company->getId()]);
        }

        return $this->render('registration/register_company.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
