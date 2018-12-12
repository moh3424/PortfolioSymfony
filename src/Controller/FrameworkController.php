<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Form\FrameworkType;
use App\Entity\User;
use App\Entity\Framework;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;

class FrameworkController extends AbstractController
{
    /**
     * @Route("/framework/update/{id}", name="update_framework")
     */
    public function frameworkUpdateAction(Request $request, $id){
        $repoUser = $this -> getDoctrine()->getRepository(User::class);
        $users = $repoUser->findAll();
        // On récupère le framework à modifier grâce à l'id passé dans l'url
        $repository = $this -> getDoctrine() -> getRepository(Framework::class);
        $framework = $repository -> find($id);
        $form = $this -> createForm(FrameworkType::class, $framework);
        // Je génére le formulaire (HTML, - partie visuelle)
        $formframeworkView = $form -> createView();
         // permet de récupèrer 
         $form -> handleRequest($request);
        
        if($form -> isSubmitted() && $form -> isValid()){
            // On verra plustard la validation
            $em = $this -> getDoctrine() -> getManager();
            $em -> persist($framework);
          
            $em -> flush();
            return $this -> redirectToRoute('update_framework');
            $request -> getSession() -> getFlashBag() -> add('success', 'Félicitations le framework a été mis à jour !');
        }
        $params = array(
            'title' => 'Mofification framework n°' . $id,
            'users'=> $users,
            'frameworkForm' => $formframeworkView,
            'photo' => $framework -> getPhoto()
        );
        return $this -> render('framework/update_framework.html.twig', $params);
    }

    /**
     * @Route("/framework/delete/{id}", name="delete_framework")
     * 
     * Route pour supprimer un framework de la BDD
     */
    public function deleteFrameworkAction($id, Request $request){
        // On récupère le framework via le manager.. Parcequ'en va en avoir besoin pour la suppression
        $em = $this -> getDoctrine() -> getManager();
        $framework = $em -> find(Framework::class, $id);
        
        $em -> remove($framework);
        $em -> flush();
        $session = $request -> getSession();
        $session -> getFlashBag() -> add('success', 'Le framework n°' . $id . 'a été supprimé'); 
        return new Response("OK, le framework de l'id:" . $id . " a été supprimé, avec succès ! "); 
        
        return $this -> redirectToRoute('delete_framework');
    }

}
