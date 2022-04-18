<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Admin
 *
 * @ORM\Table(name="admin")
 * @ORM\Entity(repositoryClass="App\Repository\AdminRepository")
 */
class Admin
{
    /**
     * @var \Personne
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_admin", referencedColumnName="id_personne")
     * })
     */
    private $idAdmin;

    public function getIdAdmin(): ?Personne
    {
        return $this->idAdmin;
    }

    public function setIdAdmin(?Personne $idAdmin): self
    {
        $this->idAdmin = $idAdmin;

        return $this;
    }


}
