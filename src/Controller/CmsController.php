<?php

namespace App\Controller;

use App\Form\CmsType;
use App\Entity\Cms;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CmsController extends AbstractController
{
   
    
    
    /**
     * @Route("/cms/update/{id}", name="update_cms")
     */
    public function cmsUpdateAction(Request $request, $id){
        $repoUser = $this -> getDoctrine()->getRepository(User::class);
        $users = $repoUser->findAll();
        // On récupère le cms à modifier grâce à l'id passé dans l'url
        $repository = $this -> getDoctrine() -> getRepository(cms::class);
        $cms = $repository -> find($id);
        $form = $this -> createForm(CmsType::class, $cms);
        // Je génére le formulaire (HTML, - partie visuelle)
        $formCmsView = $form -> createView();
         // permet de récupèrer 
         $form -> handleRequest($request);
        
        if($form -> isSubmitted() && $form -> isValid()){
            // On verra plustard la validation
            $em = $this -> getDoctrine() -> getManager();
            $em -> persist($cms);
          
            $em -> flush();
            $request -> getSession() -> getFlashBag() -> add('success', 'Félicitations le cms a été mis à jour !');
            return $this -> redirectToRoute('cms');
        }
        $params = array(
            'title' => 'Mofification CMS n°' . $id,
            'users'=> $users,
            'cmsForm' => $formCmsView,
            'photo' => $cms -> getPhoto()
        );
        return $this -> render('cms/update_cms.html.twig', $params);
    }

    /**
     * @Route("/cms/delete/{id}", name="delete_cms")
     * 
     * Route pour supprimer un cms de la BDD
     */
    public function deleteCmsAction($id, Request $request){
        // On récupère le CMS via le manager.. Parcequ'en va en avoir besoin pour la suppression
        $em = $this -> getDoctrine() -> getManager();
        $cms = $em -> find(Cms::class, $id);
        
        $em -> remove($cms);
        $em -> flush();
        $session = $request -> getSession();
        $session -> getFlashBag() -> add('success', 'Le CMS n°' . $id . 'a été supprimé'); 
        return new Response("OK, le cms de l'id:" . $id . " a été supprimé, avec succès ! "); 
        
        return $this -> redirectToRoute('cms');
    }

   
}
