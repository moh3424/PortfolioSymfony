<?php

namespace App\Controller;


use App\Form\CmsType;

use App\Entity\Cms;
use App\Entity\Back;
use App\Entity\User;
use App\Entity\Front;
use App\Entity\Loisir;
use App\Entity\Profil;
use App\Entity\Formation;
use App\Entity\Framework;
use App\Entity\Experience;
use App\Entity\Specialite;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        $repoUser = $this -> getDoctrine()->getRepository(User::class);
        $users = $repoUser->findAll();

        $repoSpecialite = $this -> getDoctrine()->getRepository(Specialite::class);
        $specialites = $repoSpecialite->findAll();

        $repoExperience = $this -> getDoctrine()->getRepository(Experience::class);
        $experiences = $repoExperience->findAll();
        
        $repoFormation = $this -> getDoctrine()->getRepository(Formation::class);
        $formations = $repoFormation->findAll();

        $repoProfil = $this -> getDoctrine()->getRepository(Profil::class);
        $profils = $repoProfil->findAll();
        
        $repoLoisir = $this -> getDoctrine()->getRepository(Loisir::class);
        $loisirs = $repoLoisir->findAll();
        
        $repoFront = $this -> getDoctrine()->getRepository(Front::class);
        $fronts = $repoFront->findAll();
        
        $repoBack = $this -> getDoctrine()->getRepository(Back::class);
        $backs = $repoBack->findAll();
        
        $repoFramework = $this -> getDoctrine()->getRepository(Framework::class);
        $frameworks = $repoFramework->findAll();

        $repoCms = $this -> getDoctrine()->getRepository(Cms::class);
        $cmss = $repoCms->findAll();

        return $this->render('admin/home.html.twig', [
            'users'=> $users,
            'specialites'=> $specialites,
            'experiences'=> $experiences,
            'formations' => $formations,
            'profils' => $profils,
            'loisirs'=> $loisirs,
            'fronts'=> $fronts,
            'backs'=> $backs,
            'frameworks'=> $frameworks,
            'cmss'=> $cmss
        ]);
    }
    
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {

        $repoUser = $this -> getDoctrine()->getRepository(User::class);
        $users = $repoUser->findAll();

        $repoSpecialite = $this -> getDoctrine()->getRepository(Specialite::class);
        $specialites = $repoSpecialite->findAll();

        $repoExperience = $this -> getDoctrine()->getRepository(Experience::class);
        $experiences = $repoExperience->findAll();
        
        $repoFormation = $this -> getDoctrine()->getRepository(Formation::class);
        $formations = $repoFormation->findAll();

        $repoProfil = $this -> getDoctrine()->getRepository(Profil::class);
        $profils = $repoProfil->findAll();
        
        $repoLoisir = $this -> getDoctrine()->getRepository(Loisir::class);
        $loisirs = $repoLoisir->findAll();
        
        $repoFront = $this -> getDoctrine()->getRepository(Front::class);
        $fronts = $repoFront->findAll();
        
        $repoBack = $this -> getDoctrine()->getRepository(Back::class);
        $backs = $repoBack->findAll();
        
        $repoFramework = $this -> getDoctrine()->getRepository(Framework::class);
        $frameworks = $repoFramework->findAll();

        $repoCms = $this -> getDoctrine()->getRepository(Cms::class);
        $cmss = $repoCms->findAll();

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'users'=> $users,
            'specialites'=> $specialites,
            'experiences'=> $experiences,
            'formations' => $formations,
            'profils' => $profils,
            'loisirs'=> $loisirs,
            'fronts'=> $fronts,
            'backs'=> $backs,
            'frameworks'=> $frameworks,
            'cmss'=> $cmss,
            
        ]);
    }

    /**
     * @Route("/admin/front", name="front")
     */
    public function front()
    {
        $repoUser = $this -> getDoctrine()->getRepository(User::class);
        $users = $repoUser->findAll();

        $repoFront = $this -> getDoctrine()->getRepository(Front::class);
        $fronts = $repoFront->findAll();
        return $this->render('admin/front.html.twig', [
            'users'=> $users,
            'fronts'=> $fronts,
            
        ]);
    }

     /**
     * @Route("/admin/cms", name="cms")
     */
    public function cms()
    {
        $repoUser = $this -> getDoctrine()->getRepository(User::class);
        $users = $repoUser->findAll();

        $repoCms = $this -> getDoctrine()->getRepository(Cms::class);
        $cmss = $repoCms->findAll();
        return $this->render('admin/cms.html.twig', [
            'users'=> $users,
            'cmss'=> $cmss,
        ]);
    }

    /**
     * @Route("/admin/back", name="back")
     */
    public function back()
    {
        $repoUser = $this -> getDoctrine()->getRepository(User::class);
        $users = $repoUser->findAll();

        $repoBack = $this -> getDoctrine()->getRepository(Back::class);
        $backs = $repoBack->findAll();
        return $this->render('admin/back.html.twig', [
            'users'=> $users,
            'backs'=> $backs,
        ]);
    }

    
    /**
     * @Route("/admin/framework", name="framework")
     */
    public function framework()
    {
        $repoUser = $this -> getDoctrine()->getRepository(User::class);
        $users = $repoUser->findAll();

        $repoFramework = $this -> getDoctrine()->getRepository(Framework::class);
        $frameworks = $repoFramework->findAll();

        return $this->render('admin/framework.html.twig', [
            'users'=> $users,
            'frameworks'=> $frameworks,
        ]);
    }
    
    /**
     * @Route("/admin/dashbord", name="dashbord")
     */
    public function dashbord()
    {
        $repoUser = $this -> getDoctrine()->getRepository(User::class);
        $users = $repoUser->findAll();
        return $this->render('admin/index2.html.twig', [
            'controller_name' => 'AdminController',
            'users'=> $users,
          
            
        ]);
    }


    /**
     * @Route("/admin/topNav", name="topNav")
     */
    public function topNav()
    {
        $repoUser = $this -> getDoctrine()->getRepository(User::class);
        $users = $repoUser->findAll();
        return $this->render('admin/top-nav.html.twig', [
            'users'=> $users,
        ]);
    }

    /**
     * @Route("/admin/boxed", name="boxed")
     */
    public function boxed()
    {
        $repoUser = $this -> getDoctrine()->getRepository(User::class);
        $users = $repoUser->findAll();
        return $this->render('admin/boxed.html.twig', [
            'users'=> $users,
        ]);
    }

    /**
     * @Route("/admin/fixed", name="fixed")
     */
    public function fixed()
    {
        $repoUser = $this -> getDoctrine()->getRepository(User::class);
        $users = $repoUser->findAll();
        return $this->render('admin/fixed.html.twig', [
            'users'=> $users,
        ]);
    }
    /**
     * @Route("/admin/collapsedSidebar", name="collapsedSidebar")
     */
    public function collapsedSidebar()
    {
        $repoUser = $this -> getDoctrine()->getRepository(User::class);
        $users = $repoUser->findAll();
        return $this->render('admin/collapsed-sidebar.html.twig', [
            'users'=> $users,
        ]);
    }

    
    /**
     * @Route("/admin/calendar", name="calendar")
     */
    public function calendar()
    {
        $repoUser = $this -> getDoctrine()->getRepository(User::class);
        $users = $repoUser->findAll();
        return $this->render('admin/calendar.html.twig', [
            'users'=> $users,
        ]);
    }

 

   

    /**
     * @Route("/admin/timeline", name="timeline")
     */
    public function timeline()
    {
        return $this->render('admin/timeline.html.twig');
    }

    /**
     * @Route("/admin/sliders", name="sliders")
     */
    public function sliders()
    {
        return $this->render('admin/sliders.html.twig');
    }

}
