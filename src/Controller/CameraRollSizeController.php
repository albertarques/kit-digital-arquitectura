<?php

namespace App\Controller;

use App\Entity\CameraRollSize;
use App\Form\CameraRollSizeType;
use App\Repository\CameraRollSizeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/camera/roll/size')]
class CameraRollSizeController extends AbstractController
{
    #[Route('/', name: 'app_camera_roll_size_index', methods: ['GET'])]
    public function index(CameraRollSizeRepository $cameraRollSizeRepository): Response
    {
        return $this->render('camera_roll_size/index.html.twig', [
            'camera_roll_sizes' => $cameraRollSizeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_camera_roll_size_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cameraRollSize = new CameraRollSize();
        $form = $this->createForm(CameraRollSizeType::class, $cameraRollSize);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cameraRollSize);
            $entityManager->flush();

            return $this->redirectToRoute('app_camera_roll_size_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('camera_roll_size/new.html.twig', [
            'camera_roll_size' => $cameraRollSize,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_camera_roll_size_show', methods: ['GET'])]
    public function show(CameraRollSize $cameraRollSize): Response
    {
        return $this->render('camera_roll_size/show.html.twig', [
            'camera_roll_size' => $cameraRollSize,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_camera_roll_size_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CameraRollSize $cameraRollSize, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CameraRollSizeType::class, $cameraRollSize);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_camera_roll_size_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('camera_roll_size/edit.html.twig', [
            'camera_roll_size' => $cameraRollSize,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_camera_roll_size_delete', methods: ['POST'])]
    public function delete(Request $request, CameraRollSize $cameraRollSize, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cameraRollSize->getId(), $request->request->get('_token'))) {
            $entityManager->remove($cameraRollSize);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_camera_roll_size_index', [], Response::HTTP_SEE_OTHER);
    }
}
