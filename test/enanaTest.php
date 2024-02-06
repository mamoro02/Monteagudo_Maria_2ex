<?php

use PHPUnit\Framework\TestCase;

include './src/Enana.php';

class EnanaTest extends TestCase
{

    public function testCreandoEnana()
    {
        #Se probará la creación de enanas vivas, muertas y en limbo y se comprobará tanto la vida como el estado
         //Juana está muerta
        $enana = new Enana('Juana', 2);
        $this->assertEquals('viva', $enana->getSituacion());
       
    }
    public function testHeridaLeveVive()
    {
        #Se probará el efecto de una herida leve a una Enana con puntos de vida suficientes para sobrevivir al ataque
        #Se tendrá que probar que la vida es mayor que 0 y además que su situación es viva
        //Juana está viva
        $enana = new Enana('Juana', 25);
        $this->assertEquals('viva', $enana->heridaLeve());
    }

    public function testHeridaLeveMuere()
    {
        #Se probará el efecto de una herida leve a una Enana con puntos de vida insuficientes para sobrevivir al ataque
        #Se tendrá que probar que la vida es menor que 0 y además que su situación es muerta
        $enana = new Enana('Juana', 2);
        $this->assertEquals('muerta', $enana->heridaLeve());
    }

    public function testHeridaGrave()
    {
        #Se probará el efecto de una herida grave a una Enana con una situación de viva.
        #Se tendrá que probar que la vida es 0 y además que su situación es limbo
        //Juana está limbo
        $enana = new Enana('Juana', 10);
        $this->assertEquals('limbo', $enana->heridaLeve());
    }

    public function testPocimaRevive()
    {
        #Se probará el efecto de administrar una pócima a una Enana muerta pero con una vida mayor que -10 y menor que 0
        #Se tendrá que probar que la vida es mayor que 0 y que su situación ha cambiado a viva
        $enana = new Enana('Juana', -5);
        $this->assertEquals('viva', $enana->pocima());
    }

    public function testPocimaNoRevive()
    {
        #Se probará el efecto de administrar una pócima a una Enana en el libo
        #Se tendrá que probar que la vida y situación no ha cambiado
        $enana = new Enana('Juana', 0);
        $this->assertEquals('limbo', $enana->pocima());

    }

    public function testPocimaExtraLimbo()
    {
        #Se probará el efecto de administrar una pócima Extra a una Enana en el limbo.
        #Se tendrá que probar que la vida es 50 y la situación ha cambiado a viva.
        $enana = new Enana('Juana', 0);
        $this->assertEquals('viva', $enana->pocimaExtra());
    }
}
