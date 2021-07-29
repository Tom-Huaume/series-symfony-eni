<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SerieController extends AbstractController
{
    #[Route('/series', name: 'serie_list')]
    public function list(): Response
    {
        return $this->render('serie/list.html.twig', [

        ]);
    }
}