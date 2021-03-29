<?php


namespace App\Tests\Unit;
use App\Entity\Adherent;
use PHPUnit\Framework\TestCase;

class AdherentTest extends TestCase
{
    public function testCanBeCreated(): void
    {
        $this->assertInstanceOf(
            Adherent::class, new Adherent()
        );
    }
}