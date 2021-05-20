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
        $navItems = [];

        $movies = ['title' => "Movie",
                    'path' => "movie",
                    'items' => $repoMovie->findAll()];

        $genres = ['title' => "Genres",
                    'path' => "genre",
                    'items' => $repoGenre->findAll()];
        $navItems[]= $genres;

        $actors = ['title' => "Actors",
                    'path' => "actor",
                    'items' => $repoActor->findAll()];
        $navItems[]= $actors;

        $studios = ['title' => "Studios",
                    'path' => "studio",
                    'items' => $repoStudio->findAll()];
        $navItems[]= $studios;

        return $this->render('home/index.html.twig', [
            'items' => $movies,
            'navItems'=> $navItems
        ]);
    }

    /**
     * @Route("/genre", name="genre")
     */
    public function genre(MovieRepository $repoMovie, GenreRepository $repoGenre, ActorRepository $repoActor, StudioRepository $repoStudio ): Response
    {
        $navItems = [];

        $genres = ['title' => "Genre",
                    'path' => "genre",
                    'items' => $repoGenre->findAll()];
        $navItems[]= $genres;

        $actors = ['title' => "Actors",
                    'path' => "actor",
                    'items' => $repoActor->findAll()];
        $navItems[]= $actors;

        $studios = ['title' => "Studios",
                    'path' => "studio",
                    'items' => $repoStudio->findAll()];
        $navItems[]= $studios;

        return $this->render('home/index.html.twig', [
            'items'=> $genres,
            'navItems'=> $navItems
        ]);
    }

    /**
     * @Route("/genre/{id}", name="genresView")
     */
    public function genresView(GenreRepository $repoGenre, $id): Response
    {
        $navItems = [];

        $genre = ['title' => "Genre",
                    'path' => "genre",
                    'item'=>$repoGenre->find($id)];
        
        $movies = ['title' => "Movie",
                    'path' => "movie",
                    'items' => $genre['item']->getMovies()];;

        $genres = ['title' => "Genres",
                    'path' => "genre",
                    'items' => $repoGenre->findAll()];
        $navItems[]= $genres;

        return $this->render('home/index.html.twig', [
            'items' => $movies,
            'navItems'=> $navItems,
            'category'=> $genre
        ]);
    }

    /**
     * @Route("/actor", name="actor")
     */
    public function actor(MovieRepository $repoMovie, GenreRepository $repoGenre, ActorRepository $repoActor, StudioRepository $repoStudio ): Response
    {
        $navItems = [];

        $genres = ['title' => "Genres",
                    'path' => "genre",
                    'items' => $repoGenre->findAll()];
        $navItems[]= $genres;

        $actors = ['title' => "Actor",
                    'path' => "actor",
                    'items' => $repoActor->findAll()];

        $studios = ['title' => "Studios",
                    'path' => "studio",
                    'items' => $repoStudio->findAll()];
        $navItems[]= $studios;

        return $this->render('home/index.html.twig', [
            'items'=> $actors,
            'navItems'=> $navItems
        ]);
    }

    /**
     * @Route("/actor/{id}", name="actorsView")
     */
    public function actorsView(ActorRepository $repoActor, $id): Response
    {
        $navItems = [];

        $actor = ['title' => "Actor",
                    'item'=>$repoActor->find($id)];
        $movies = ['title' => "Movie",
                    'path' => "movie",
                    'items' => $actor['item']->getMovies()];;
       /*  dd($movies);
        usort($movies, function($a1, $a2) {
            $v1 = strtotime($a1->getReleaseDate()->format('Y-m-d'));
            $v2 = strtotime($a2->getReleaseDate()->format('Y-m-d'));
            return $v2 - $v1; // $v2 - $v1 to reverse direction
         });
 */
        $actors = ['title' => "Actors",
                    'path' => "actor",
                    'items' => $repoActor->findAll()];
        $navItems[]= $actors;

        return $this->render('home/index.html.twig', [
            'items' => $movies,
            'navItems'=> $navItems,
            'category'=> $actor
        ]);
    }

    /**
     * @Route("/studio", name="studio")
     */
    public function studio(MovieRepository $repoMovie, GenreRepository $repoGenre, ActorRepository $repoActor, StudioRepository $repoStudio ): Response
    {
        $navItems = [];

        $genres = ['title' => "Genres",
                    'path' => "genre",
                    'items' => $repoGenre->findAll()];
        $navItems[]= $genres;

        $actors = ['title' => "Actor",
                    'path' => "actor",
                    'items' => $repoActor->findAll()];
        $navItems[]= $actors;

        $studios = ['title' => "Studios",
                    'path' => "studio",
                    'items' => $repoStudio->findAll()];

        return $this->render('home/index.html.twig', [
            'items'=> $studios,
            'navItems'=> $navItems
        ]);
    }


    /**
     * @Route("/studio/{id}", name="studiosView")
     */
    public function studiosView(StudioRepository $repoStudio, $id): Response
    {
        $navItems = [];

        $studio = ['title' => "Studio",
                    'item'=>$repoStudio->find($id)];
        $movies = ['title' => "Movie",
                    'path' => "movie",
                    'items' => $studio['item']->getMovies()];;
       
        $studios = ['title' => "Studios",
                    'path' => "studio",
                    'items' => $repoStudio->findAll()];
        $navItems[]= $studios;

        return $this->render('home/index.html.twig', [
            'items' => $movies,
            'navItems'=> $navItems,
            'category'=> $studio
        ]);
    }

    /**
     * @Route("/about", name="about")
     */
    public function about(): Response
    {
        return $this->render('home/about.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
