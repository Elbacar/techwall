<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request ;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SessionController extends AbstractController
{
    #[Route('/session', name: 'app_session')]
    public function index( Request $request): Response
    {
         
        // en php on fesait session_start, en symfony on fait 
        $session= $request->getSession();

        if ($session->has('NbreV')) {
           
            $NbreV=$session->get('NbreV') + 1 ; 
            $session->set('NbreV',$NbreV);

        }
        
        else {
             
            $NbreV=1;
            $session->set('NbreV',$NbreV);
        }
        return $this->render('session/index.html.twig');
    }
}
