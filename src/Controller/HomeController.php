<?php

namespace App\Controller;

use App\Repository\ActorRepository;
use App\Repository\GenreRepository;
use App\Repository\MovieRepository;
use App\Repository\StudioRepository;
use App\Repository\UserRepository;
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
     * @Route("/movie/{id}", name="moviesView")
     */
    public function moviesView(MovieRepository $repoMovie, GenreRepository $repoGenre, ActorRepository $repoActor, StudioRepository $repoStudio, $id ): Response
    {
        $navItems = [];

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
        $movie = ['title' => "Movie",
                    'path' => "movie",
                    'item'=>$repoMovie->find($id)];

        return $this->render('home/index.html.twig', [
            'navItems'=> $navItems,
            'category'=> $movie
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
     * @Route("/profile/{id}", name="profileView")
     */
    public function profileView(MovieRepository $repoMovie, GenreRepository $repoGenre, ActorRepository $repoActor, StudioRepository $repoStudio, UserRepository $repoUser, $id): Response
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
        $navItems[]= $studios;

        $profile = ['title' => "Profile",
            'path' => "profile",
            'item' => $repoUser->find($id)];

        return $this->render('home/index.html.twig', [
            'navItems'=> $navItems,
            'category'=> $profile
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
