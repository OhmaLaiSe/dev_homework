<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Form\MovieType;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/movie")
 */
class MovieController extends AbstractController
{
    /**
     * @Route("/", name="movie_index", methods={"GET"})
     */
    public function index(MovieRepository $movieRepository): Response
    {
        return $this->render('movie/index.html.twig', [
            'movies' => $movieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="movie_show", methods={"GET"})
     */
    public function show(Movie $movie): Response
    {
        return $this->render('movie/show.html.twig', [
            'movie' => $movie,
        ]);
    }

    /**
     * @Route("/{id}", name="movie_rate1")
     */
    public function rate1(Movie $movie): Response
    {
        $movie->setAvgRating(1);
        $this->getDoctrine()->getManager()->persist($movie);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('movie_index');
    }

    /**
     * @Route("/{id}", name="movie_rate2")
     */
    public function rate2(Movie $movie): Response
    {
        $movie->setAvgRating(2);
        $this->getDoctrine()->getManager()->persist($movie);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('movie_index');
    }

    /**
     * @Route("/{id}", name="movie_rate3")
     */
    public function rate3(Movie $movie): Response
    {
        $movie->setAvgRating(3);
        $this->getDoctrine()->getManager()->persist($movie);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('movie_index');
    }

    /**
     * @Route("/{id}", name="movie_rate4")
     */
    public function rate4(Movie $movie): Response
    {
        $movie->setAvgRating(4);
        $this->getDoctrine()->getManager()->persist($movie);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('movie_index');
    }

    /**
     * @Route("/{id}", name="movie_rate5")
     */
    public function rate5(Movie $movie): Response
    {
        $movie->setAvgRating(5);
        $this->getDoctrine()->getManager()->persist($movie);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('movie_index');
    }
}
