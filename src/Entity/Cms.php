<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * 
 * @ORM\Entity(repositoryClass="App\Repository\CmsRepository")
 */
class Cms
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(name="photo", type="string", length=255, nullable=false)
     */
    private $photo;

    private $file;

    /**
     * @ORM\Column(type="smallint")
     */
    private $niveau;

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto(): ?string
    {
        return $this->photo;
    }
    
    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Cms
     */
    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getNiveau(): ?int
    {
        return $this->niveau;
    }

    public function setNiveau(int $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    // Getter et setter de file
    public function setFile(UploadedFile $file = NULL){
        // la classe UploadedFile de symfony nous permet de gérer tous les fichiers uploadés.
        $this->file = $file;
        return $this;
    }
    public function getFile(){
        return $this->file;
    }

    // Fonction pour charger un fichier 
    public function chargementPhoto(){
        if($this->file) {
            $nom_original = $this->file-> getClientOriginalName();
            // cette méthode me retourne le nom original de la photo
            // équivalent à : $_FILES['photo']['name']
            $new_nom_photo = $this -> renameFile($nom_original);
            // me retourne le nom du fichier modifié
            $this->photo = $new_nom_photo;
            // Pour enregistrer dans la BDD le nouveau nom de la photo...
            $this->file -> move($this->photoDir(), $new_nom_photo);
            // move() permet de déplacer la photo (physiquement, c'est à dire les octets qui compose le fichier du photo) vers son emplacement définitif. L'arguments : 1/ Le dossier de destination, 2/ le nom de la photo. 
        }
    }

      // Fonction pour renomer une fonction
      public function renameFile($nom_original){
        // $nom_original = cms.jpg
        return 'photo_' . time() . '_' . rand(1, 9999) . $nom_original;
        // exemple : photo_15225554523_666_cms.jpg
    }
    
    // // Fonction pour retourner le chemin du dossier du photo 
    public function photoDir(){
        return __DIR__ . '/../../public/photo';
    }

   

   
}
