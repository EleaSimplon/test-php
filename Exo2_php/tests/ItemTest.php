<?php

use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testDescriptionIsNotEmpty() {
        $item = new Item;
        $item->getDescription();
        $this->assertNotEmpty($item);
    }
    
    public function testIDisAnInteger() {
        $item = new ItemChild;
        $this->assertSame(gettype($item->getId()), 'integer');
    }    

    public function testTokenIsAString() {
        $reflectionMethod = new ReflectionMethod('Item', 'getToken');
        // $reflectionMethod->setAccessible(true);
        $this->assertSame(gettype($reflectionMethod->invoke(new Item())), 'string');
    }    

    public function testPrefixedTokenStartsWithPrefix() {
        $reflectionMethod = new ReflectionMethod('Item', 'getPrefixedToken');

        $return = str_starts_with($reflectionMethod->invoke(new Item(), 'tutu'), 'tutu');

        $this->assertTrue($return);
    }    
}
