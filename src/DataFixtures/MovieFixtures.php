<?php

namespace App\DataFixtures;

use App\Entity\Director;
use App\Entity\Genre;
use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $genre1 = new Genre();
        $genre1->setGenre('Comedy');
        $genre2 = new Genre();
        $genre2->setGenre('Fantasy');

        $director1 = new Director();
        $director1->setDirector('Tim Burton');
        $director2 = new Director();
        $director2->setDirector('Paul Verhoeven');
        $director3 = new Director();
        $director3->setDirector('Paul Thomas Anderson');
        $director4 = new Director();
        $director4->setDirector('Sofia Coppola');
        $director5 = new Director();
        $director5->setDirector('Guillermo del Toro');

        $movie1 = new Movie();
        $movie1->setTitle('Beetlejuice');
        $movie1->setRating(null);
        $movie1->setDirector($director1);
        $movie1->addGenre($genre1);
        $movie1->addGenre($genre2);

        $movie2 = new Movie();
        $movie2->setTitle('Total Recall');
        $movie2->setRating(null);
        $movie2->setDirector($director2);
        $movie2->addGenre($genre2);

        $movie3 = new Movie();
        $movie3->setTitle('There Will Be Blood');
        $movie3->setRating(null);
        $movie3->setDirector($director3);

        $movie4 = new Movie();
        $movie4->setTitle('Lost in Translation');
        $movie4->setRating(null);
        $movie4->setDirector($director4);
        $movie4->addGenre($genre1);

        $movie5 = new Movie();
        $movie5->setTitle('Crimson Peak');
        $movie5->setRating(null);
        $movie5->setDirector($director5);
        $movie5->addGenre($genre2);

        $manager->persist($genre1);
        $manager->persist($genre2);
        $manager->persist($director1);
        $manager->persist($director2);
        $manager->persist($director3);
        $manager->persist($director4);
        $manager->persist($director5);
        $manager->persist($movie1);
        $manager->persist($movie2);
        $manager->persist($movie3);
        $manager->persist($movie4);
        $manager->persist($movie5);

        $manager->flush();
    }
}
