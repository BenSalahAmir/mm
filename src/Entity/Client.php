<?php

namespace App\Entity;
use App\Entity\Personne;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client 
{
    /**
     * @var int
     *
     * @ORM\Column(name="nbrAvertissement", type="integer", nullable=true)
     */
    private $nbravertissement;

    /**
     * @var int
     *
     * @ORM\Column(name="ban", type="integer", nullable=true)
     */
    private $ban;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateDebutBlock", type="date", nullable=true)
     */
    private $datedebutblock;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateFinBlock", type="date", nullable=true)
     */
    private $datefinblock;

    /**
     * @var \Personne
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClient", referencedColumnName="id_personne")
     * })
     */
    private $idclient;

    public function getNbravertissement(): ?int
    {
        return $this->nbravertissement;
    }

    public function setNbravertissement(int $nbravertissement): self
    {
        $this->nbravertissement = $nbravertissement;

        return $this;
    }

    public function getBan(): ?int
    {
        return $this->ban;
    }

    public function setBan(int $ban): self
    {
        $this->ban = $ban;

        return $this;
    }

    public function getDatedebutblock(): ?\DateTimeInterface
    {
        return $this->datedebutblock;
    }

    public function setDatedebutblock(?\DateTimeInterface $datedebutblock): self
    {
        $this->datedebutblock = $datedebutblock;

        return $this;
    }

    public function getDatefinblock(): ?\DateTimeInterface
    {
        return $this->datefinblock;
    }

    public function setDatefinblock(?\DateTimeInterface $datefinblock): self
    {
        $this->datefinblock = $datefinblock;

        return $this;
    }

    public function getIdclient(): ?Personne
    {
        return $this->idclient;
    }

    public function setIdclient(?Personne $idclient): self
    {
        $this->idclient = $idclient;

        return $this;
    }

    
 

}
