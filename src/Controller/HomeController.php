<?php

namespace App\Controller;

use App\Entity\Car;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $allcars = $doctrine->getRepository(Car::class)->findBy([],['id' => 'DESC']);

        return $this->render('home/index.html.twig', [
            'cars'=> $allcars,
            'controller_name' => 'HomeController',
        ]);
    }
}
