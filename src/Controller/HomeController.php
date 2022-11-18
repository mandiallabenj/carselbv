<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\CarMake;
use App\Repository\CarMakeRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $allCars = $doctrine->getRepository(Car::class)->findAll();

        return $this->render('home/index.html.twig', [
            'cars'=> $allCars,
            'controller_name' => 'HomeController',
        ]);
    }
}
