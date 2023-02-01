<?php
	
require 'functions.php';
use PHPUnit\Framework\TestCase; 

class FunctionTest extends TestCase {

	public function testAddReturnsTheCorrectSum() {

        $result = add(10, 20);
        $this->assertSame(30, $result);

    }

    public function testAddDoesNotReturnTheIncorrectSum() {
        $result = add(10, 20);
        $this->assertNotSame(35, $result);

	}
}
	
?>