<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/todo')]

class TodoController extends AbstractController
{
    #[Route('/', name: 'app_todo')]
    public function index(Request $request): Response
    {

        // afficher notre tableau de todo sinon je l'initialise puis je l'affiche 

        $session = $request->getSession();

        if (!$session->has('todos')) { 

                 $todos = [ 'achat'=>'acheter une Bentley', 'cours'=>'finaliser mon cours','sport'=>'seance Cardio' ] ; 

                 $session->set('todos', $todos) ; 

                 $this->addFlash('info', "la liste todos vient d'etre initialiser ");
            }      


        return $this->render('todo/index.html.twig');
    }


    #[Route('/add/{name?test}/{content?test}', name: 'app_addtodo')]
    public function addTodo(Request $request,$name,$content): RedirectResponse 
    {


        $session = $request->getSession();

    // verifier si j'ai mon tableau todo dans la session 

    if ($session->has('todos')) {      

        // si oui 
            // verifier si on a deja un todo (element du tableau) avec un meme name (clé)
                //si oui afficher une erreur  (car il vas ecraser la derniere valeur)
                // si non ajouter et afficher


                $todos=$session->get('todos');

                if(isset($todos[$name])) {

                       $this->addFlash('error', "le todo d'id $name existe deja dans la liste  ");

                }


                else { 
                        // si non ajouter et afficher
                        $todos[$name] = $content ;
                        $this->addFlash('success', "le todo d'id $name est ajouté avec succés  ");

                        $session->set('todos', $todos) ; 
                }
            } 

    else {        
        //si non 
            // afficher une erreur et rediriger vers le controlleur index pour l'initialiser 

            $this->addFlash('error', "la liste todos n'est pas encore  initialiser ");
        
    }

   


        return $this->redirectToRoute('app_todo'); // blama n3awed lkhedma madame ana flekher bghyt n affichih f ga3 les cas 
    }





    #[Route('/update/{name}/{content}', name: 'app_updatetodo')]
    public function updateTodo(Request $request,$name,$content): RedirectResponse 
    {


        $session = $request->getSession();

    // verifier si j'ai mon tableau todo dans la session 

    if ($session->has('todos')) {      


                $todos=$session->get('todos');

                if(!isset($todos[$name])) {

                       $this->addFlash('error', "le todo d'id $name n'existe pas dans la liste");

                }


                else { 
                        // si non ajouter et afficher
                        $todos[$name] = $content ;
                        $this->addFlash('success', "le todo d'id $name etait modifé avec succés  ");

                        $session->set('todos', $todos) ; 
                }
            } 

    else {        
        //si non 
            // afficher une erreur et rediriger vers le controlleur index pour l'initialiser 

            $this->addFlash('error', "la liste todos n'est pas encore  initialiser ");
        
    }

   


        return $this->redirectToRoute('app_todo'); // blama n3awed lkhedma madame ana flekher bghyt n affichih f ga3 les cas 
    }

    #[Route('/delete/{name}', name: 'app_deleteTodo')]
    public function deleteTodo(Request $request,$name): RedirectResponse 
    {


        $session = $request->getSession();

    // verifier si j'ai mon tableau todo dans la session 

    if ($session->has('todos')) {      


                $todos=$session->get('todos');

                if(!isset($todos[$name])) {

                       $this->addFlash('error', "le todo d'id $name n'existe pas dans la liste");

                }


                else { 
                        // si non ajouter et afficher
                        unset($todos[$name] ) ;  
                        $this->addFlash('success', "le todo d'id $name etait supprimer avec succés  ");
                        $session->set('todos', $todos) ; 
                }
            } 

    else {        
        //si non 
            // afficher une erreur et rediriger vers le controlleur index pour l'initialiser 

            $this->addFlash('error', "la liste todos n'est pas encore  initialiser ");
        
    }

   


        return $this->redirectToRoute('app_todo'); // blama n3awed lkhedma madame ana flekher bghyt n affichih f ga3 les cas 
    }
    #[Route('/reset', name: 'app_resetTodo')]
    public function resetTodo(Request $request): RedirectResponse 
    {


        $session = $request->getSession();

    // verifier si j'ai mon tableau todo dans la session 

       $session->remove('todos');
   


        return $this->redirectToRoute('app_todo'); // blama n3awed lkhedma madame ana flekher bghyt n affichih f ga3 les cas 
    }
    


 #[Route('/multip/{a</d+>}/{b</d+>}', name: 'app_multiplicationTodo')]
 // 'a' => '/d+' pour ces expressions regulieres on peut utiliser le site : RegExr  
    public function multiplication ($a , $b) : Response 

    {

      $produit = $a * $b ; 
      return new Response("<h1> le resultat de la multiplication de $a par $b est : $produit </h1>");


    }


}
