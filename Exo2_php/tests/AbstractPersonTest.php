<?php

use PHPUnit\Framework\TestCase;

class AbstractPersonTest extends TestCase
{
    // Mock only for protected function not private
    public function testNameAndTitleIsReturned()
    {
        // Créer un stub pour la classe AbstractPerson.
        $mock = $this->createMock(AbstractPerson::class);
        // Configurer le bouchon.
        $mock->expects($this->any())
        ->method('getNameAndTitle')
        ->willReturn('Doc');
        // Appeler $stub->doSomething() va maintenant retourner
        // 'Doc'.
        $this->assertSame('Doc', $mock->getNameAndTitle());
    }

    public function testNameAndTitleIncludesValueFromGetTitle()
    {

    }    
}