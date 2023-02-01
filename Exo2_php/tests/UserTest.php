'<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {

    public function tearDown() :void {
        Mockery::close();
    }

    public function testReturnsFullName() {
        $user = new User('elea@gmail.com');

        $user->first_name="Elea";
        $user->surname="Lelou";

        $this->assertSame('Elea Lelou', $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault() {
        $user = new User('elea@gmail.com');

        $user->first_name="";
        $user->surname="";

        $this->assertSame('', $user->getFullName());
    }

    /**
     * @test
     **/
    public function user_has_first_name() {
        $user = new User('elea@gmail.com');

        $user->first_name="Elea";

        $this->assertSame("Elea", $user->first_name);
    }

    public function testNotificationIsSent() {
        $user = new User('elea@gmail.com');
        $notify = $user->notify("Hello");

        $this->assertTrue($notify);
    }

    public function testCannotNotifyUserWithNoEmail() {
        try {
            $mailer = new Mailer();
            $user = new User('');
            $user->setMailer($mailer);
            $user->notify("Hello");
        } catch (InvalidArgumentException $error) {
            $this->assertInstanceOf('InvalidArgumentException', $error);
        }
    }


    // /**
    //  * @runInSeparateProcess
    //  * @preserveGlobalState disabled
    //  */
    // public function testNotifyReturnsTrue(){

    // }
}