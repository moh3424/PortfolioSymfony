<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReseauRepository")
 */
class Reseau
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
    private $url_reseau;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrlReseau(): ?string
    {
        return $this->url_reseau;
    }

    public function setUrlReseau(string $url_reseau): self
    {
        $this->url_reseau = $url_reseau;

        return $this;
    }
}
