<?php

namespace App\Controller;

use App\Entity\ComedianDocuments;
use App\Form\DocsType;
use PhpParser\Comment\Doc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DocumentsController extends AbstractController
{
    #[Route('/documents', name: 'documents')]
    public function index(Request $request): Response
    {
        $doc = new ComedianDocuments();
        $form = $this->createForm(DocsType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user = $this->security->getUser()->getId();
            $doc->setComedianId($user);
        }
        return $this->render('documents/index.html.twig', [
            'controller_name' => 'DocumentsController',
            'form' => $form->createView()
        ]);
    }
}
