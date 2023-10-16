<?php

namespace App\Controller;

use App\Entity\CameraRollPaperSize;
use App\Form\CameraRollPaperSizeType;
use App\Repository\CameraRollPaperSizeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/camera/roll/paper/size')]
class CameraRollPaperSizeController extends AbstractController
{
    #[Route('/', name: 'app_camera_roll_paper_size_index', methods: ['GET'])]
    public function index(CameraRollPaperSizeRepository $cameraRollPaperSizeRepository): Response
    {
        return $this->render('camera_roll_paper_size/index.html.twig', [
            'camera_roll_paper_sizes' => $cameraRollPaperSizeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_camera_roll_paper_size_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cameraRollPaperSize = new CameraRollPaperSize();
        $form = $this->createForm(CameraRollPaperSizeType::class, $cameraRollPaperSize);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cameraRollPaperSize);
            $entityManager->flush();

            return $this->redirectToRoute('app_camera_roll_paper_size_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('camera_roll_paper_size/new.html.twig', [
            'camera_roll_paper_size' => $cameraRollPaperSize,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_camera_roll_paper_size_show', methods: ['GET'])]
    public function show(CameraRollPaperSize $cameraRollPaperSize): Response
    {
        return $this->render('camera_roll_paper_size/show.html.twig', [
            'camera_roll_paper_size' => $cameraRollPaperSize,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_camera_roll_paper_size_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CameraRollPaperSize $cameraRollPaperSize, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CameraRollPaperSizeType::class, $cameraRollPaperSize);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_camera_roll_paper_size_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('camera_roll_paper_size/edit.html.twig', [
            'camera_roll_paper_size' => $cameraRollPaperSize,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_camera_roll_paper_size_delete', methods: ['POST'])]
    public function delete(Request $request, CameraRollPaperSize $cameraRollPaperSize, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cameraRollPaperSize->getId(), $request->request->get('_token'))) {
            $entityManager->remove($cameraRollPaperSize);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_camera_roll_paper_size_index', [], Response::HTTP_SEE_OTHER);
    }
}
