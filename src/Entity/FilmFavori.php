<?php

namespace App\Entity;

use App\Repository\FilmFavoriRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FilmFavoriRepository::class)
 */
class FilmFavori
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateFavori;

    /**
     * @ORM\ManyToOne(targetEntity=Film::class, inversedBy="film")
     */
    private $idFilm;

    /**
     * @ORM\ManyToMany(targetEntity=Utilisateur::class, inversedBy="filmFavoris")
     */
    private $idUtilisateur;

    public function __construct()
    {
        $this->idFilm = new ArrayCollection();
        $this->idUtilisateur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateFavori(): ?\DateTimeInterface
    {
        return $this->dateFavori;
    }

    public function setDateFavori(\DateTimeInterface $dateFavori): self
    {
        $this->dateFavori = $dateFavori;

        return $this;
    }

    /**
     * @return Collection|film[]
     */
    public function getIdFilm(): Collection
    {
        return $this->idFilm;
    }

    /**
     * @return Collection|utilisateur[]
     */
    public function getIdUtilisateur(): Collection
    {
        return $this->idUtilisateur;
    }
}
