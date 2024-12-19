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

    #[Route('/poslipole', name: 'poslipole')]
    public function posliPole(): Response
    {
        $pole = ['jedna', 'dva', 'tri', 'ctyri', 'pet'];
        return $this->render('home/posliPole.html.twig', [
            'pole' => $pole,
        ]);
    }

    #[Route('/poslipolevpoli', name: 'poslipolevpoli')]
    public function posliPoleVPoli(): Response
    {
        $lide = [
            ['jmeno' => 'Pepa', 'prijmeni' => 'Novak', 'vek' => 25],
            ['jmeno' => 'Jana', 'prijmeni' => 'Cernakova', 'vek' => 30],
            ['jmeno' => 'Karel', 'prijmeni' => 'Svoboda', 'vek' => 35],
            ['jmeno' => 'Marie', 'prijmeni' => 'Kovarova', 'vek' => 40],
            ['jmeno' => 'Jiri', 'prijmeni' => 'Dvorak', 'vek' => 45],
        ];

        return $this->render('home/posliPoleVPoli.html.twig', [
            'lide' => $lide,
        ]);
        
    }
}
