<?php

namespace App\Controller;

use App\Form\FrontType;
use App\Entity\User;
use App\Entity\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FrontController extends AbstractController
{
  /**
     * @Route("/front/update/{id}", name="update_front")
     */
    public function frontUpdateAction(Request $request, $id){
        $repoUser = $this -> getDoctrine()->getRepository(User::class);
        $users = $repoUser->findAll();
        // On récupère le cms à modifier grâce à l'id passé dans l'url
        $repository = $this -> getDoctrine() -> getRepository(Front::class);
        $front = $repository -> find($id);
        $form = $this -> createForm(FrontType::class, $front);
        // Je génére le formulaire (HTML, - partie visuelle)
        $formfrontView = $form -> createView();
         // permet de récupèrer 
         $form -> handleRequest($request);
        
        if($form -> isSubmitted() && $form -> isValid()){
            // On verra plustard la validation
            $em = $this -> getDoctrine() -> getManager();
            $em -> persist($front);
          
            $em -> flush();
            return $this -> redirectToRoute('front');
           
        }
        $params = array(
            'title' => 'Mofification CMS n°' . $id,
            'users'=> $users,
            'frontForm' => $formfrontView,
            'photo' => $front -> getPhoto()
        );
        return $this -> render('front/update_front.html.twig', $params);
    }

    /**
     * @Route("/front/delete/{id}", name="delete_front")
     * 
     * Route pour supprimer un front de la BDD
     */
    public function deletefrontAction($id, Request $request){
        // On récupère le CMS via le manager.. Parcequ'en va en avoir besoin pour la suppression
        $em = $this -> getDoctrine() -> getManager();
        $front = $em -> find(Front::class, $id);
        
        $em -> remove($front);
        $em -> flush();
        $session = $request -> getSession();
        $session -> getFlashBag() -> add('success', 'Le front n°' . $id . 'a été supprimé'); 
        // return new Response("OK, le front de l'id:" . $id . " a été supprimé, avec succès ! "); 
        return $this -> redirectToRoute('front');
        
        
    }
}
