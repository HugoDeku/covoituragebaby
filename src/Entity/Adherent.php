<?php

namespace App\Entity;

use App\Repository\AdherentRepository;
use Doctrine\ORM\Mapping as ORM;
use http\Exception\InvalidArgumentException;
use PHPUnit\TextUI\Exception;
use Symfony\Component\Dotenv\Exception\FormatException;

/**
 * @ORM\Entity(repositoryClass=AdherentRepository::class)
 */
class Adherent
{

    public function __construct(String $prenom, String $nom, String $telephone)
    {
        $this->setPrenom($prenom);
        $this->setNom($nom);
        $this->setTelephone($telephone);
    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $telephone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        if(strlen($telephone) == 10){
            $this->telephone = $telephone;
        }else{
            throw new \InvalidArgumentException("Le numéro de téléphone doit contenir 10 digits");
        }
        return $this;
    }

    public function getNomComplet(){
        return $this->getPrenom() . " " . $this->getNom();
    }
}
