<?php


namespace App\Tests\Unit;


use App\Entity\Adherent;
use App\Entity\Utilisateur;

class UtilisateurTest extends \PHPUnit\Framework\TestCase
{
    public function testCanBeCreated(): void
    {
        $this->assertInstanceOf(
            Utilisateur::class, $this->generateUtilisateur()
        );
    }

    public function generateAdherent() : Adherent{
        $adherent = new Adherent("Patrick", "Guetta", "0610101010");
        return $adherent;
    }

    public function generateUtilisateur() : Utilisateur
    {
        $utilisateur = new Utilisateur();
        $utilisateur->setPseudo("Groszgeg");
        $utilisateur->setMotdepasse(sha1("cestvraiquejenaiungros987897&"));
        $utilisateur->setEmail("gros.zgeg@zgegmail.fr");
        $utilisateur->setAdherent($this->generateAdherent());
        return $utilisateur;
    }

    public function testSetEmail(){
        $this->expectException(\InvalidArgumentException::class);
        $utilisateur = new Utilisateur();
        $utilisateur->setEmail("groszgeg.fr");
        $this->expectException(\InvalidArgumentException::class);
        $utilisateur->setEmail("groszgeg@fr");
        $this->expectException(\InvalidArgumentException::class);
        $utilisateur->setEmail("groszgegfr");
        $utilisateur->setEmail("groszgeg@zgegfr.fr");
        $this->assertNotNull($utilisateur->getEmail());

    }

    public function testGetPseudo(){
        $utilisateur = $this->generateUtilisateur();
        $this->assertIsString($utilisateur->getPseudo());
    }

    public function testGetMotDePasse(){
        $utilisateur = $this->generateUtilisateur();
        $this->assertIsString($utilisateur->getMotdepasse());
    }

    public function testGetEmail(){
        $utilisateur = $this->generateUtilisateur();
        $this->assertIsString($utilisateur->getEmail());
    }

    public function testGetAdherent(){
        $utilisateur = $this->generateUtilisateur();
        $this->assertInstanceOf(Adherent::class, $utilisateur->getAdherent());
    }

}