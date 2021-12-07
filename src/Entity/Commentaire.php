<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentaireRepository::class)
 */
class Commentaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $contenu;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\OneToOne(targetEntity=Commentaire::class, mappedBy="reponse", cascade={"persist", "remove"})
     */
    private $commentaire;

    /**
     * @ORM\OneToOne(targetEntity=Film::class, inversedBy="commentaire", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $film;

    /**
     * @ORM\ManyToMany(targetEntity=Utilisateur::class, inversedBy="commentaires")
     */
    private $auteur;

    public function __construct()
    {
        $this->auteur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCommentaire(): ?self
    {
        return $this->commentaire;
    }

    public function setCommentaire(?self $commentaire): self
    {
        // unset the owning side of the relation if necessary
        if ($commentaire === null && $this->commentaire !== null) {
            $this->commentaire->setReponse(null);
        }

        // set the owning side of the relation if necessary
        if ($commentaire !== null && $commentaire->getReponse() !== $this) {
            $commentaire->setReponse($this);
        }

        $this->commentaire = $commentaire;

        return $this;
    }

    public function getFilm(): ?film
    {
        return $this->film;
    }

    public function setFilm(film $film): self
    {
        $this->film = $film;

        return $this;
    }

    /**
     * @return Collection|utilisateur[]
     */
    public function getAuteur(): Collection
    {
        return $this->auteur;
    }

    public function addAuteur(utilisateur $auteur): self
    {
        if (!$this->auteur->contains($auteur)) {
            $this->auteur[] = $auteur;
        }

        return $this;
    }

    public function removeAuteur(utilisateur $auteur): self
    {
        $this->auteur->removeElement($auteur);

        return $this;
    }
}
