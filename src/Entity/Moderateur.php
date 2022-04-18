<?php

namespace App\Entity;
use App\Entity\Personne;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Moderateur
 *
 * @ORM\Table(name="moderateur")
 * @ORM\Entity(repositoryClass="App\Repository\ModerateurRepository")
 */
class Moderateur
{
    /**
     * @var \Personne
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_moderateur", referencedColumnName="id_personne")
     * })
     * 
     */
    private $idModerateur;

    public function getIdModerateur(): ?Personne
    {
        return $this->idModerateur;
    }
    public function setIdModerateur(?Personne $idModerateur): self
    {
        $this->idModerateur = $idModerateur;

        return $this;
    }


}
