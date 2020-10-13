<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DBController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response("It's alive!!!");
    }
}