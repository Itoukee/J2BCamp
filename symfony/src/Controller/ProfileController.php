<?php

namespace App\Controller;

use App\Form\UpdateProfileType;
use App\Form\UserType;
use App\Repository\CompaniesRepository;
use App\Repository\UserRepository;
use App\Security\Voter\ProfileVoter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\AddressType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{


    #[Route('/profile/{id}', name: 'profile_show')]
    public function index(int $id, UserRepository $userRepository): Response
    {
        $profile = $userRepository->find($id);
        $this->denyAccessUnlessGranted(ProfileVoter::VIEW, $profile);
        $form = $this->createForm(UserType::class);
        $updateProfile = $this->createForm(UpdateProfileType::class);
        return $this->render('profile/profile.html.twig', [
            'form' => $form->createView(),
            'updateProfile' => $updateProfile->createView(),
            'profile' => $profile
        ]);
    }
    #[Route('/profile/{id}', name: 'app_company_edit')]
    public function edit(int $id, Request $request, UserRepository $userRepository, EntityManagerInterface $entityManager): Response
    {
        $user = $userRepository->find($id);
        $form = $this->createForm(UpdateProfileType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('profile', ["id" => $user->getId()]);
        }

        return $this->render('company/edit.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
