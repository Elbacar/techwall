<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FirstController extends AbstractController
{
    #[Route('/first/', name: 'app_first')]
    public function index(): Response
    {   
        return $this->render('first/hello.html.twig', 
        ['firstName' => 'Houssam-eddine' , 'name' => 'elbacar']
           
        );
    }
     

        //#[Route('/first/{firstName}/{name}', name: 'first')]
    public function sayhello($firstName , $name): Response
    {   
    

        return $this->render('first/index.html.twig', 
        ['firstName' => $firstName , 'name' => $name]
           
        );
    }
}
