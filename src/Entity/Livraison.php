<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livraison
 *
 * @ORM\Table(name="livraison", indexes={@ORM\Index(name="fk_livraison_livreur", columns={"idLivreur"}), @ORM\Index(name="fk_livraison_commande", columns={"idCommande"})})
 * @ORM\Entity(repositoryClass="App\Repository\LivraisonRepository")
 */
class Livraison
{
    /**
     * @var int
     *
     * @ORM\Column(name="idCommande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcommande;

    /**
     * @var int
     *
     * @ORM\Column(name="idLivreur", type="integer", nullable=false)
     */
    private $idlivreur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateHeure", type="date", nullable=false)
     */
    private $dateheure;

    public function getIdcommande(): ?int
    {
        return $this->idcommande;
    }

    public function getIdlivreur(): ?int
    {
        return $this->idlivreur;
    }

    public function setIdlivreur(int $idlivreur): self
    {
        $this->idlivreur = $idlivreur;

        return $this;
    }

    public function getDateheure(): ?\DateTimeInterface
    {
        return $this->dateheure;
    }

    public function setDateheure(\DateTimeInterface $dateheure): self
    {
        $this->dateheure = $dateheure;

        return $this;
    }


}
