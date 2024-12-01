<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/hello', name: 'app_hello')]
    public function hello(): Response
    {
        return new Response('<h1 style="font-weight:bold;color:blue">Ahoj světe! Zdeněk Frydrýn</h1>');
    }

    #[Route('/aktualne', name: 'app_aktualne')]
    // new twig template
    public function aktualne(): Response
    {
        return $this->render('home/aktualne.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    
}
