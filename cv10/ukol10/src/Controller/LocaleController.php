<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LocaleController extends AbstractController
{
    #[Route('/locale', name: 'app_locale')]
    public function index(): Response
    {
        return $this->render('locale/index.html.twig', [
            'controller_name' => 'LocaleController',
        ]);
    }

    /**
     * @Route("/change-locale/{locale}", name="change_locale")
     */
    public function changeLocale(Request $request, string $locale): Response
    {
        // Store the locale in the session
        $request->getSession()->set('_locale', $locale);

        // Redirect to the previous page
        $referer = $request->headers->get('referer');
        return $this->redirect($referer ?: $this->generateUrl('app_home'));
    }
}
