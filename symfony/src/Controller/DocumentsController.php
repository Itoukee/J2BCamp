<?php

namespace App\Controller;

use App\Entity\ComedianDocuments;
use App\Form\DocsType;
use App\Repository\ComedianDocumentsRepository;
use Doctrine\ORM\EntityManagerInterface;
use PhpParser\Comment\Doc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Security;
use Vich\UploaderBundle\Handler\DownloadHandler;

class DocumentsController extends AbstractController
{
    public function __construct(private Security $security)
    {
    }

    #[Route('/documents', name: 'documents')]
    public function index(Request $request, EntityManagerInterface $entityManager, ComedianDocumentsRepository $comedianDocumentsRepository): Response
    {
        $doc = new ComedianDocuments();
        $form = $this->createForm(DocsType::class);
        $form->handleRequest($request);
        $user = $this->security->getUser();

        if ($form->isSubmitted() && $form->isValid()) {

            $doc = $form->getData();
            $doc->setUser($user);
            $doc->setCreatedAt(new \DateTime());
            $entityManager->persist($doc);
            $entityManager->flush();
        }
        return $this->render('documents/index.html.twig', [
            'form' => $form->createView(),
            "documents" => $comedianDocumentsRepository->findBy(["user" => $user])
        ]);
    }

    #[Route('/documents/toggle/{id}', name: 'document_toggle')]
    public function toggle(int $id, Request $request, ComedianDocumentsRepository $comedianDocumentsRepository, EntityManagerInterface $entityManager)
    {
        $doc = $comedianDocumentsRepository->find($id);
        $doc->setPaid(1 - $doc->getPaid());
        $entityManager->persist($doc);
        $entityManager->flush();
        return $this->redirect($this->generateUrl("ketchup"));
    }

    #[Route('/documents/download/{id}', name: 'document_download')]
    public function download(int $id, Request $request, ComedianDocumentsRepository $comedianDocumentsRepository, DownloadHandler $downloadHandler)
    {
        $doc = $comedianDocumentsRepository->find($id);
        return $downloadHandler->downloadObject($doc, "imageFile");
    }

}
