<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;

use App\Repository\AlbumRepository;

use App\Entity\Album;

use App\Entity\User;

use App\Form\RegistrationType;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


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


    /**
     * @Route("/registration", name="registration")
     */
    public function registration(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            
            $passwordCrypted = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($passwordCrypted);
           

            $user->setRoles("ROLE_USER");
            
            $manager->persist($user);
            $manager->flush();
            return $this->redirectToRoute('adminIndexAlbum');
        }


        return $this->render('home/registration.html.twig', [
                                "form" => $form->createView()
                        ]);
    }



}
