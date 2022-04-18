<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participation
 *
 * @ORM\Table(name="participation", indexes={@ORM\Index(name="fk_client_participation", columns={"idClient"}), @ORM\Index(name="fk_participation_event", columns={"idEvent"})})
 * @ORM\Entity(repositoryClass="App\Repository\ParticipationRepository")
 */
class Participation
{
    /**
     * @var int
     *
     * @ORM\Column(name="idParticipation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idparticipation;

    /**
     * @var int
     *
     * @ORM\Column(name="idEvent", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idevent;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrEtoile", type="integer", nullable=false)
     */
    private $nbretoile;

    /**
     * @var \Client
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClient", referencedColumnName="idClient")
     * })
     */
    private $idclient;

    public function getIdparticipation(): ?int
    {
        return $this->idparticipation;
    }

    public function getIdevent(): ?int
    {
        return $this->idevent;
    }

    public function getNbretoile(): ?int
    {
        return $this->nbretoile;
    }

    public function setNbretoile(int $nbretoile): self
    {
        $this->nbretoile = $nbretoile;

        return $this;
    }

    public function getIdclient(): ?Client
    {
        return $this->idclient;
    }

    public function setIdclient(?Client $idclient): self
    {
        $this->idclient = $idclient;

        return $this;
    }


}
