<?php

namespace App\Controller;

use App\Repository\ActorRepository;
use App\Repository\GenreRepository;
use App\Repository\MovieRepository;
use App\Repository\StudioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(MovieRepository $repoMovie, GenreRepository $repoGenre, ActorRepository $repoActor, StudioRepository $repoStudio ): Response
    {
        $movies = $repoMovie->findAll();
        $genres = $repoGenre->findAll();
        $actors = $repoActor->findAll();
        $studios = $repoStudio->findAll();
        return $this->render('home/index.html.twig', [
            'movies' => $movies,
        ]);
    }

    /**
     * @Route("/genre/{id}", name="genres")
     */
    public function genres(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
