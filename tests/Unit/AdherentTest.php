<?php


namespace App\Tests\Unit;
use App\Entity\Adherent;
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
        return $adherent;
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
}