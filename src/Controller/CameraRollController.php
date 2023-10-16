<?php

namespace App\Controller;

use App\Entity\CameraRoll;
use App\Form\CameraRollType;
use App\Repository\CameraRollRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/camera/roll')]
class CameraRollController extends AbstractController
{
    #[Route('/', name: 'app_camera_roll_index', methods: ['GET'])]
    public function index(CameraRollRepository $cameraRollRepository): Response
    {
        return $this->render('camera_roll/index.html.twig', [
            'camera_rolls' => $cameraRollRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_camera_roll_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cameraRoll = new CameraRoll();
        $form = $this->createForm(CameraRollType::class, $cameraRoll);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cameraRoll);
            $entityManager->flush();

            return $this->redirectToRoute('app_camera_roll_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('camera_roll/new.html.twig', [
            'camera_roll' => $cameraRoll,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_camera_roll_show', methods: ['GET'])]
    public function show(CameraRoll $cameraRoll): Response
    {
        return $this->render('camera_roll/show.html.twig', [
            'camera_roll' => $cameraRoll,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_camera_roll_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CameraRoll $cameraRoll, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CameraRollType::class, $cameraRoll);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_camera_roll_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('camera_roll/edit.html.twig', [
            'camera_roll' => $cameraRoll,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_camera_roll_delete', methods: ['POST'])]
    public function delete(Request $request, CameraRoll $cameraRoll, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cameraRoll->getId(), $request->request->get('_token'))) {
            $entityManager->remove($cameraRoll);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_camera_roll_index', [], Response::HTTP_SEE_OTHER);
    }
}
