<?php

use PHPUnit\Framework\TestCase;

class MailerTest extends TestCase
{
    public function testSendMessageReturnsTrue() {
        // Instancier new Mailer
        $mailer = new Mailer;
        // Tester le retour de funuction
        $this->assertSame(true, $mailer->sendMessage('j.42@gmail.com', 'Hello Jean le best') );
    }
}