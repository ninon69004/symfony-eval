<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Genre;
use App\Entity\Movie;
use App\Entity\Actor;
use App\Entity\Studio;
use App\Entity\UserMovie;
use DateTime;
use Faker;
use \joshtronic\LoremIpsum;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Faker\Factory::create();

        $movies = [];
        for( $i=0; $i < 50; $i++){
            $movie = new Movie();
            $movie->setName($faker->words($faker->numberBetween(1,5),  $asText = true));
            $movie->setOriginalName($faker->words($faker->numberBetween(1,5), $asText = true));
            $movie->setImage(null);
            $movie->setReleaseDate($faker->dateTimeBetween($startDate = '-120 years', $endDate = 'now', $timezone = null));
            $movie->setSynopsis($faker->text($faker->numberBetween(500,2000)));
            $manager->persist($movie);
            $movies[] = $movie;
        }

        $studios = [];
        for( $i=0; $i < 10; $i++){
            $studio = new Studio();
            $studio->setName($faker->company);
            $studio->addMovie($movies[$faker->numberBetween(0,49)]);
            $manager->persist($studio);
            $studios[] = $studio;
            //movies
        }
        
        $genres = [];
        for( $i=0; $i < 15; $i++){
            $genre = new Genre();
            $genre->setName($faker->domainWord);
            $genre->addMovie($movies[$faker->numberBetween(0,49)]);
            $manager->persist($genre);
            $genres[] = $genre;
        }

        $actors = [];
        for( $i=0; $i < 50; $i++){
            $actor = new Actor();
            $actor->setFirstName($faker->firstName());
            $actor->setLastName($faker->lastName());
            $actor->setImage(null);
            $actor->setBiography($faker->text($faker->numberBetween(50,1000)));
            $date1 = $faker->dateTimeBetween($startDate = '-120 years', $endDate = 'now', $timezone = null);
            $actor->setDateOfBirth($date1);
            $actor->setDateOfDeath($faker->dateTimeBetween($startDate = $date1, $endDate = 'now', $timezone = null));
            $actor->addMovie($movies[$faker->numberBetween(0,49)]);
            $manager->persist($actor);
            $actors[] = $actor;
        }
        

        
        $users = [];
        // user creation
        $user = new User();
        $user->setUsername('admin');
        $user->setFirstName('admin');
        $user->setLastName('admin');
        $user->setEmail('admin@test.com');
        $user->setPassword('admin1');
        $manager->persist($user);
        $users[] = $user;
        // Only so we can see relation to UserMovie
        for( $i=0; $i < 5; $i++){
            $user = new User();
            $user->setUsername($faker->name);
            $user->setFirstName($faker->firstName());
            $user->setLastName($faker->lastName());
            $user->setEmail($faker->email());
            $user->setPassword($faker->password());
            $manager->persist($user);
            $users[] = $user;
        }
        $userMovies = [];
        for( $i=0; $i < 15; $i++){
            $userM = new UserMovie();
            $userM->setUser($users[$faker->numberBetween(0,5)]);
            $userM->setMovie($movies[$faker->numberBetween(0,49)]);
            $userM->setList($faker->boolean($chanceOfGettingTrue = 50));
            $userM->setSeen($faker->boolean($chanceOfGettingTrue = 50));
            $manager->persist($userM);
            $userMovies[] = $userM;
        }
        
        $manager->flush();
    }
}
