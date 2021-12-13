<?php

namespace App\Controller;

use App\Form\UpdateProfileType;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\Security\Voter\ProfileVoter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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
}
