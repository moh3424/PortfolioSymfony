<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SpecialiteRepository")
 */
class Specialite
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
    private $intituleSpec;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntituleSpec(): ?string
    {
        return $this->intituleSpec;
    }

    public function setIntituleSpec(string $intituleSpec): self
    {
        $this->intituleSpec = $intituleSpec;

        return $this;
    }
}
