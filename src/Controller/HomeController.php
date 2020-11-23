<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;

use App\Repository\AlbumRepository;

use App\Entity\Album;



class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function indexAlbum(AlbumRepository $albumRepository): Response
    {
        $albums = $albumRepository->findall();

        return $this->render('home/index.html.twig', [
            'albums' => $albums,
        ]);

    }


    /**
     * @Route("/album/{id}", name="displayAlbum")
     */
    public function displayAlbum(Album $album)
    {
        return $this->render('home/displayAlbum.html.twig', [
                'album' => $album
            ]);
    }

}
