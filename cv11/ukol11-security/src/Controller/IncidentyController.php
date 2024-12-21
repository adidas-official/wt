<?php

namespace App\Controller;

use App\Entity\Incidenty;
use App\Form\IncidentyType;
use App\Repository\IncidentyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/incidenty')]
final class IncidentyController extends AbstractController
{
    #[Route(name: 'app_incidenty_index', methods: ['GET'])]
    public function index(IncidentyRepository $incidentyRepository): Response
    {
        return $this->render('incidenty/index.html.twig', [
            'incidenties' => $incidentyRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_incidenty_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $incidenty = new Incidenty();
        $form = $this->createForm(IncidentyType::class, $incidenty);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($incidenty);
            $entityManager->flush();

            return $this->redirectToRoute('app_incidenty_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('incidenty/new.html.twig', [
            'incidenty' => $incidenty,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_incidenty_show', methods: ['GET'])]
    public function show(Incidenty $incidenty): Response
    {
        return $this->render('incidenty/show.html.twig', [
            'incidenty' => $incidenty,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_incidenty_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Incidenty $incidenty, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(IncidentyType::class, $incidenty);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_incidenty_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('incidenty/edit.html.twig', [
            'incidenty' => $incidenty,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_incidenty_delete', methods: ['POST'])]
    public function delete(Request $request, Incidenty $incidenty, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$incidenty->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($incidenty);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_incidenty_index', [], Response::HTTP_SEE_OTHER);
    }
}
