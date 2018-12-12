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
        $this -> file = $file;
        return $this;
    }
    public function getFile(){
        return $this -> file;
    }

   

   
}
