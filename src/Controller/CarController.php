<?php

namespace App\Controller;

use ApiPlatform\Api\IriConverterInterface;
use App\Entity\Car;
use App\Entity\CarMake;
use App\Form\CarMakeFormType;
use App\Form\CarType;
use App\Repository\CarMakeRepository;
use App\Repository\CarRepository;
use Doctrine\Persistence\ManagerRegistry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function ApiPlatform\Symfony\Routing\getIriFromResource;

class CarController extends AbstractController
{

    #[Route('/car', name: 'app_car')]
    public function index(): Response
    {
        return $this->render('car/index.html.twig', [
            'controller_name' => 'CarController',
        ]);
    }

    #[IsGranted('ROLE_USER')]
    #[Route('/car/add', name: 'app_car_add')]
    public function addcar(ManagerRegistry $doctrine, Request $request): Response
    {
        $user = $this->getUser();
        $em = $doctrine->getManager();
        $car = new Car();
        $form = $this->createForm(CarType::class,$car);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $car = $form->getData();

            /** @var UploadedFile $uploadedFile */
            $uploadedFile = $form['carFilename']->getData();
            $destination = $this->getParameter('kernel.project_dir').'/public/uploads';
            $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
            $newFilename = $originalFilename.'_'.uniqid().'.'.$uploadedFile->guessExtension();
            $uploadedFile->move(
                $destination,
                $newFilename
            );
            $car->setCarFilename($newFilename);
            $car->setCreatedAt(new \DateTimeImmutable());
            $car->setUser($user);

            $em->persist($car);
            $em->flush();

            $this->addFlash('notice', 'Car Uploaded! Inaccuracies squashed!');



        }
        return$this->renderForm('car/new.html.twig',[
            'carform'=>$form,
        ]);
    }




    #[Route('/car/list/{title}', name:'app_car_show')]
    public function show(ManagerRegistry $doctrine, Car $car): Response
    {
        $selected_car = $doctrine->getRepository(Car::class)->findOneCar($car);
        return $this->render('car/show.html.twig',[
            'car' => $selected_car,
        ]);
    }
    #[Route('/car/list', name:'app_car_list_all')]
    public function list(ManagerRegistry $doctrine): Response
    {
        $carMakeList = $doctrine->getRepository(CarMake::class)->findAll();
        $cars = $doctrine->getRepository(Car::class)->findAll();
        return $this->render('car/list.html.twig',[
            'cars' => $cars,
            'carMakeList' => $carMakeList,
        ]);
    }

    #[Route('/car/search/results', name:'app_car_list_results')]
    public function results(CarRepository $doctrine, Request $request): Response
    {
        $search = $request->query->get('q');

        $cars = $doctrine->findCarBySearch($search);



        return $this->render('car/list.html.twig',[
                'cars' => $cars,
            ]);

    }


    #[Route('/car/test', name:'app_car_test')]
    public function test(): Response
    {
        return $this->render('car/test.html.twig',[

        ]);
    }


    #
    #[IsGranted('ROLE_USER')]
    #[Route('/car/add/car/make/form', name: 'app_car_make_form')]
    public function carMakeForm(ManagerRegistry $doctrinecarmake, Request $request): Response
    {

        $em = $doctrinecarmake->getManager();
        $carMake = new CarMake();
        $carMakeForm = $this->createForm(CarMakeFormType::class,$carMake);

        $carMakeForm->handleRequest($request);

        if($carMakeForm->isSubmitted() && $carMakeForm->isValid()){
            $car = $carMakeForm->getData();

            $em->persist($carMake);
            $em->flush();

            $this->addFlash('notice', 'Car Make Uploaded! Inaccuracies squashed');



        }
        return$this->renderForm('car/car-make-form.html.twig',[
            'carMakeForm'=>$carMakeForm,
        ]);
    }


    #[Route('/car/list/make/{id}', name: 'app_car_make')]
    public function byCarMake(CarMake $carMake, IriConverterInterface $iriConverter){
        return$this->renderForm('car/list.html.twig',[
            'currentCarMake' => $iriConverter-getIriFromItem($carMake),
        ]);
    }



}
