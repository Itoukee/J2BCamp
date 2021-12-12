<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class ProfileController extends AbstractController
{
    #[Route('/profile/{id}', name: 'profile_show')]
    public function index(int $id, UserRepository $userRepository): Response
    {
        $profile = $userRepository->find($id);
        $this->denyAccessUnlessGranted("profile_view", $profile);
        $form = $this->createForm(UserType::class);
        return $this->render('profile/profile.html.twig', [
            'form' => $form->createView(),
            'profile' => $profile
        ]);
    }
}
