<?php


namespace App\Tests\Unit;
use App\Entity\Adherent;
use App\Entity\Utilisateur;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Dotenv\Exception\FormatException;
use Webmozart\Assert\InvalidArgumentException;

class AdherentTest extends TestCase
{
    public function testCanBeCreated(): void
    {
        $this->assertInstanceOf(
            Adherent::class, $this->generateAdherent()
        );
    }

    public function generateAdherent() : Adherent{
        $adherent = new Adherent("Patrick", "Guetta", "0610101010");
        $adherent->setUtilisateur($this->generateUtilisateur());
        return $adherent;
    }

    public function generateUtilisateur() : Utilisateur
    {
        $utilisateur = new Utilisateur();
        $utilisateur->setPseudo("Groszgeg");
        $utilisateur->setMotdepasse(sha1("cestvraiquejenaiungros987897&"));
        $utilisateur->setEmail("gros.zgeg@zgegmail.fr");
        return $utilisateur;
    }

    public function testSetTelephone(){
        $this->expectException(\InvalidArgumentException::class);
        $adherent = $this->generateAdherent();
        $tel = "093939";
        $adherent->setTelephone($tel);
        $this->assertNull($adherent->getTelephone());
        $tel = "0909090909";
        $adherent->setTelephone($tel);
        $this->assertNotNull($adherent->getTelephone());
    }

    public function testGetNomComplet(){
        $adherent = $this->generateAdherent();
        $prenom = $adherent->getPrenom();
        $nom = $adherent->getNom();
        $nomcomplet = $prenom . " " . $nom;
        $this->assertEquals($nomcomplet, $adherent->getNomComplet());
    }

    public function testGetPrenom(){
        $adherent = $this->generateAdherent();
        $this->assertIsString($adherent->getPrenom());
    }

    public function testGetNom(){
        $adherent = $this->generateAdherent();
        $this->assertIsString($adherent->getNom());
    }

    public function testGetTelephone(){
        $adherent = $this->generateAdherent();
        $this->assertIsString($adherent->getTelephone());
    }

    public function testGetUtilisateur(){
        $adherent = $this->generateAdherent();
        $this->assertInstanceOf(Utilisateur::class, $adherent->getUtilisateur());
    }
}