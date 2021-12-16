<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\Security\Voter\ProfileVoter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{


    #[Route('/profile/{id}', name: 'profile_show')]
    public function index(int $id, UserRepository $userRepository): Response
    {
        $profile = $userRepository->find($id);
        $this->denyAccessUnlessGranted(ProfileVoter::VIEW, $profile);
        return $this->render('profile/profile.html.twig', [
            'profile' => $profile,

        ]);
    }

    #[Route('/profile/edit/{id}', name: 'profile_edit')]
    public function edit(int $id, Request $request, UserRepository $userRepository, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = $userRepository->find($id);
        $form = $this->createForm(UserType::class, $user, [
            "usePassword" => false,
            'useRole' => false
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('profile_show', ["id" => $user->getId()]);
        }

        return $this->render('user/edit.html.twig', [
            'editForm' => $form->createView(),
        ]);
    }
}
