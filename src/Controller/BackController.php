<?php

namespace App\Controller;

use App\Form\BackType;
use App\Entity\User;
use App\Entity\Back;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BackController extends AbstractController
{

    /**
     * @Route("/back/update/{id}", name="update_back")
     */
    public function backUpdateAction(Request $request, $id){
        $repoUser = $this -> getDoctrine()->getRepository(User::class);
        $users = $repoUser->findAll();
        // On récupère le cms à modifier grâce à l'id passé dans l'url
        $repository = $this -> getDoctrine() -> getRepository(Back::class);
        $back = $repository -> find($id);
        $form = $this -> createForm(BackType::class, $back);
        // Je génére le formulaire (HTML, - partie visuelle)
        $formbackView = $form -> createView();
         // permet de récupèrer 
         $form -> handleRequest($request);
        
        if($form -> isSubmitted() && $form -> isValid()){
            // On verra plustard la validation
            $em = $this -> getDoctrine() -> getManager();
            $em -> persist($back);
          
            $em -> flush();
            $request -> getSession() -> getFlashBag() -> add('success', 'Félicitations le cms a été mis à jour !');
            return $this -> redirectToRoute('back');
        }
        $params = array(
            'title' => 'Mofification CMS n°' . $id,
            'users'=> $users,
            'backForm' => $formbackView,
            'photo' => $back -> getPhoto()
        );
        return $this -> render('back/update_back.html.twig', $params);
    }

    /**
     * @Route("/back/delete/{id}", name="delete_back")
     * 
     * Route pour supprimer un back de la BDD
     */
    public function deleteBackAction($id, Request $request){
        // On récupère le CMS via le manager.. Parcequ'en va en avoir besoin pour la suppression
        $em = $this -> getDoctrine() -> getManager();
        $back = $em -> find(Back::class, $id);
        
        $em -> remove($back);
        $em -> flush();
        $session = $request -> getSession();
        $session -> getFlashBag() -> add('success', 'Le BACK n°' . $id . 'a été supprimé'); 
        return new Response("OK, le back de l'id:" . $id . " a été supprimé, avec succès ! "); 
        
        return $this -> redirectToRoute('back');
    }

}
