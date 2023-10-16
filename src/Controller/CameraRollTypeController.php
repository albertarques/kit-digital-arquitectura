<?php

namespace App\Controller;

use App\Entity\CameraRollType;
use App\Form\CameraRollTypeType;
use App\Repository\CameraRollTypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/camera/roll/type')]
class CameraRollTypeController extends AbstractController
{
    #[Route('/', name: 'app_camera_roll_type_index', methods: ['GET'])]
    public function index(CameraRollTypeRepository $cameraRollTypeRepository): Response
    {
        return $this->render('camera_roll_type/index.html.twig', [
            'camera_roll_types' => $cameraRollTypeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_camera_roll_type_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cameraRollType = new CameraRollType();
        $form = $this->createForm(CameraRollTypeType::class, $cameraRollType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cameraRollType);
            $entityManager->flush();

            return $this->redirectToRoute('app_camera_roll_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('camera_roll_type/new.html.twig', [
            'camera_roll_type' => $cameraRollType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_camera_roll_type_show', methods: ['GET'])]
    public function show(CameraRollType $cameraRollType): Response
    {
        return $this->render('camera_roll_type/show.html.twig', [
            'camera_roll_type' => $cameraRollType,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_camera_roll_type_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CameraRollType $cameraRollType, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CameraRollTypeType::class, $cameraRollType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_camera_roll_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('camera_roll_type/edit.html.twig', [
            'camera_roll_type' => $cameraRollType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_camera_roll_type_delete', methods: ['POST'])]
    public function delete(Request $request, CameraRollType $cameraRollType, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cameraRollType->getId(), $request->request->get('_token'))) {
            $entityManager->remove($cameraRollType);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_camera_roll_type_index', [], Response::HTTP_SEE_OTHER);
    }
}
