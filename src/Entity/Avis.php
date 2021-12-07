<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AvisRepository::class)
 */
class Avis
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $positif;

    /**
     * @ORM\ManyToOne(targetEntity=Film::class, inversedBy="avis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idFilm;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="avis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idUtilisateur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPositif(): ?bool
    {
        return $this->positif;
    }

    public function setPositif(bool $positif): self
    {
        $this->positif = $positif;

        return $this;
    }

    public function getIdFilm(): ?film
    {
        return $this->idFilm;
    }

    public function setIdFilm(?film $idFilm): self
    {
        $this->idFilm = $idFilm;

        return $this;
    }

    public function getIdUtilisateur(): ?utilisateur
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(?utilisateur $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }
}
