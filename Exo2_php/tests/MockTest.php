<?php

use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
    public function testMock()
    {
        //Créer un mock de la class mailer
        $mock = $this->createMock(Mailer::class);
        //Implémenter dans ce mock la methode sendMessage et la faire retourner true
        $mock->expects($this->any())
        ->method('sendMessage')
        ->willReturn(true);
        //Tester naivement que la méthode du mock retourne true
        $this->assertTrue($mock->sendMessage('elea@gmail.com', 'hello BG'));
    }
}