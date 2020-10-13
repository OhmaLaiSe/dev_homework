<?php


namespace App\Controller;


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
}