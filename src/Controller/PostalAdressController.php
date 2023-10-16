<?php

namespace App\Controller;

use App\Entity\PostalAdress;
use App\Form\PostalAdressType;
use App\Repository\PostalAdressRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/postal/adress')]
class PostalAdressController extends AbstractController
{
    #[Route('/', name: 'app_postal_adress_index', methods: ['GET'])]
    public function index(PostalAdressRepository $postalAdressRepository): Response
    {
        return $this->render('postal_adress/index.html.twig', [
            'postal_adresses' => $postalAdressRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_postal_adress_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $postalAdress = new PostalAdress();
        $form = $this->createForm(PostalAdressType::class, $postalAdress);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($postalAdress);
            $entityManager->flush();

            return $this->redirectToRoute('app_postal_adress_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('postal_adress/new.html.twig', [
            'postal_adress' => $postalAdress,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_postal_adress_show', methods: ['GET'])]
    public function show(PostalAdress $postalAdress): Response
    {
        return $this->render('postal_adress/show.html.twig', [
            'postal_adress' => $postalAdress,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_postal_adress_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PostalAdress $postalAdress, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PostalAdressType::class, $postalAdress);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_postal_adress_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('postal_adress/edit.html.twig', [
            'postal_adress' => $postalAdress,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_postal_adress_delete', methods: ['POST'])]
    public function delete(Request $request, PostalAdress $postalAdress, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$postalAdress->getId(), $request->request->get('_token'))) {
            $entityManager->remove($postalAdress);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_postal_adress_index', [], Response::HTTP_SEE_OTHER);
    }
}
