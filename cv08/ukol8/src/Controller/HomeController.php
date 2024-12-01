<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/HomeController.php',
        ]);
    }

    #[Route('/getter', name: 'ukol8_getter')]
    public function getter(Request $request): Response
    {
        $name = $request->query->get('name');
        $text = $request->query->get('toLower');
        return $this->render('home/getter.html.twig', [
            'name' => $name,
            'toLower' => $text,
            'dump' => ['num1' => '1', 'num2' => '2', 'num3' => '3']
        ]);
    }
    
    #[Route('/homepage', name: 'ukol8_homepage')]
    public function homepage(): Response
    {
        return $this->render('home/index.html.twig');
    }

    #[Route('/about', name: 'ukol8_about')]
    public function about(): Response
    {
        return $this->render('home/about.html.twig');
    }

    #[Route('/contact', name: 'ukol8_contact')]
    public function contact(): Response
    {
        return $this->render('home/contact.html.twig');
    }
}

