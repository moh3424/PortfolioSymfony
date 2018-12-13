<?php

namespace App\Controller;

use App\Entity\Profil;
use App\Form\ProfilType;
use App\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProfilController extends AbstractController
{
  
/**
     * @Route("/profil/update/{id}", name="update_profil")
     */
    public function profilUpdateAction(Request $request, $id){
        $repoUser = $this -> getDoctrine()->getRepository(User::class);
        $users = $repoUser->findAll();
        // On récupère le profil à modifier grâce à l'id passé dans l'url
        $repository = $this -> getDoctrine() -> getRepository(Profil::class);
        $profil = $repository -> find($id);
        $form = $this -> createForm(ProfilType::class, $profil);
        // Je génére le formulaire (HTML, - partie visuelle)
        $formprofilView = $form -> createView();
         // permet de récupèrer 
         $form -> handleRequest($request);
        
        if($form -> isSubmitted() && $form -> isValid()){
            // On verra plustard la validation
            $em = $this -> getDoctrine() -> getManager();
            $em -> persist($profil);
            
            $em -> flush();
            return $this -> redirectToRoute('profil');
            $request -> getSession() -> getFlashBag() -> add('success', 'Félicitations le profil a été mis à jour !');
        }
        $params = array(
            'title' => 'Mofification profil n°' . $id,
            'users'=> $users,
            'profilForm' => $formprofilView
            
        );
        return $this -> render('profil/update_profil.html.twig', $params);
    }
    
}
