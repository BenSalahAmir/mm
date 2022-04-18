<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Streamer
 *
 * @ORM\Table(name="streamer")
 * @ORM\Entity(repositoryClass="App\Repository\StreamerRepository")
 */
class Streamer
{
    /**
     * @var string
     *
     * @ORM\Column(name="informations", type="string", length=100, nullable=false)
     */
    private $informations;

    /**
     * @var string
     *
     * @ORM\Column(name="lienStreaming", type="string", length=50, nullable=false)
     */
    private $lienstreaming;

    /**
     * @var \Personne
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idStreamer", referencedColumnName="id_personne")
     * })
     */
    private $idstreamer;

    public function getInformations(): ?string
    {
        return $this->informations;
    }

    public function setInformations(string $informations): self
    {
        $this->informations = $informations;

        return $this;
    }

    public function getLienstreaming(): ?string
    {
        return $this->lienstreaming;
    }

    public function setLienstreaming(string $lienstreaming): self
    {
        $this->lienstreaming = $lienstreaming;

        return $this;
    }

    public function getIdstreamer(): ?Personne
    {
        return $this->idstreamer;
    }

    public function setIdstreamer(?Personne $idstreamer): self
    {
        $this->idstreamer = $idstreamer;

        return $this;
    }


}
