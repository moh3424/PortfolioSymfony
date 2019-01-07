<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

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

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function index(){
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
}