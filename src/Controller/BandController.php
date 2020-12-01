<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;

use App\Repository\BandRepository;

use App\Entity\Band;

use App\Form\BandType;


class BandController extends AbstractController
{
    /**
     * @Route("/bands", name="bands")
     */
    public function index(BandRepository $bandRepository): Response
    {
         $bands = $bandRepository->findall();


        return $this->render('band/index.html.twig', ['bands' => $bands] );
    }


    /**
     * @Route("/band/{id}", name="displayBand")
     */
    public function displayBand(Band $band)
    {
        return $this->render('band/displayBand.html.twig', [
                'band' => $band
            ]);
    }

}
