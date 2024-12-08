<?php

namespace App\Controller;

use App\Entity\Sklad;
use App\Form\SkladType;
use App\Repository\SkladRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/sklad')]
final class SkladController extends AbstractController
{
    #[Route(name: 'app_sklad_index', methods: ['GET'])]
    public function index(SkladRepository $skladRepository): Response
    {
        return $this->render('sklad/index.html.twig', [
            'sklads' => $skladRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_sklad_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $sklad = new Sklad();
        $form = $this->createForm(SkladType::class, $sklad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($sklad);
            $entityManager->flush();

            return $this->redirectToRoute('app_sklad_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('sklad/new.html.twig', [
            'sklad' => $sklad,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sklad_show', methods: ['GET'])]
    public function show(Sklad $sklad): Response
    {
        return $this->render('sklad/show.html.twig', [
            'sklad' => $sklad,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_sklad_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Sklad $sklad, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SkladType::class, $sklad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_sklad_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('sklad/edit.html.twig', [
            'sklad' => $sklad,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sklad_delete', methods: ['POST'])]
    public function delete(Request $request, Sklad $sklad, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sklad->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($sklad);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_sklad_index', [], Response::HTTP_SEE_OTHER);
    }
}
