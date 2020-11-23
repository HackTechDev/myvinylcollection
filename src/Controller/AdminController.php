<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;

use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;

use App\Repository\AlbumRepository;

use App\Entity\Album;

use App\Form\AlbumType;


use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="adminIndexAlbum")
     */
    public function index(AlbumRepository $albumRepository): Response
    {
        $albums = $albumRepository->findall();

        return $this->render('admin/index.html.twig', [
                'albums' => $albums
            ]
        );

    }
}
