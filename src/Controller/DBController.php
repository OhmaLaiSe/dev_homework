<?php


namespace App\Controller;


use App\Entity\Director;
use App\Entity\Genre;
use App\Entity\Movie;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class DBController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage(Environment $twigEnvironment)
    {
        return $this->render('movie/homepage.html.twig');
    }

    /**
     * @Route("/movies/create")
     */
    public function createAction(EntityManagerInterface $entityManager)
    {
        $genre1 = new Genre();
        $genre1->setGenre('Comedy');
        $genre2 = new Genre();
        $genre2->setGenre('Sci-Fi');
        $genre3 = new Genre();
        $genre3->setGenre('Drama');

        $director1 = new Director();
        $director1->setDirector('Tim Burton');
        $director2 = new Director();
        $director2->setDirector('Paul Verhoeven');
        $director3 = new Director();
        $director3->setDirector('Paul Thomas Anderson');

        $movie = new Movie();
        $movie->setTitle('Beetlejuice');
        $movie->setRating(null);
        $movie->setDirector($director1);
        $movie->addGenre($genre1);

        $entityManager->persist($genre1);
        $entityManager->persist($genre2);
        $entityManager->persist($director1);
        $entityManager->persist($movie);
        $entityManager->flush();

        return new Response(sprintf("Movie: #%d, Title: #%s", $movie->getId(), $movie->getTitle()));
    }

    /**
     * @Route("/movies/update")
     */
    public function updateAction(EntityManagerInterface $entityManager)
    {
        $movie = $entityManager->getRepository('App:Movie')->find(1);
        $movie->setTitle('new title');
        $entityManager->flush();

        return new Response(sprintf("Title: %s", $movie->getTitle()));
    }

    /**
     * @Route("/movies/delete")
     */
    public function deleteAction(EntityManagerInterface $entityManager)
    {
        $director = $entityManager->getRepository('App:Director')->find(13);
        $entityManager->remove($director);
        $entityManager->flush();

        return new Response(sprintf("Deleted", $director->getDirector()));
    }
}