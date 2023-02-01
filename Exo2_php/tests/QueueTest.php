<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase {

    protected $queue;

    // setUp() de notre queue
    protected function setUp() :void {
        $this->queue = new Queue;
    }

    // On vérifie si notre queue est vide en testant le  setUp()
    public function testNewQueueIsEmpty() {
        $queue = $this->setUp();
        $this->assertEmpty($queue);
    }
    
    public function testAnItemIsAddedToTheQueue() {
        // On definie un item dans le tableau
        $item = ['turlut'];
        // On instancie une new queue
        $queue = new Queue;
        // On push l'item dans la queue
        $queue->push($item);
        // On count cb item dans la queue
        $count = $queue->getCount();
        // On compare notre count avec le nombre d'item attendu = 1 car on en a ajouté qu'un
        $this->assertSame(1, $count);
    }

    public function testAnItemIsRemovedFromTheQueue() { 
        $queue = new Queue;
        $queue->push('turlut');
        // On clear tous les items du tableau
        $queue->clear();
        $count = $queue->getCount();
        // On compare notre count avec le nombre d'item attendu = 0 car on en a TOUT clear
        $this->assertSame(0, $count);
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue() {
        $queue = new Queue;
        $queue->push('turlut');
        $queue->push('utut');
        // On enleve le premier element du tableau
        $queue->pop();
        // On count cb item dans la queue après la sup du premier item
        $count = $queue->getCount();
        // On compare notre count avec le nombre d'item attendu = 1 car on en a 2 puis sup un
        $this->assertSame(1, $count);
    }

    public function testMaxNumberOfItemsCanBeAdded() {
        $queue = new Queue;

        $queue->push('turlut');
        $queue->push('utut');
        $queue->push('queue');
        $queue->push('leuleu');
        $queue->push('hihi');

        $count = $queue->getCount();

        $this->assertSame(5, $count);
    }
    
    public function testExceptionThrownWhenAddingAnItemToAFullQueue()
    {
        $queue = new Queue;
        
        try {
            $queue->push('turlut');
            $queue->push('utut');
            $queue->push('queue');
            $queue->push('leuleu');
            $queue->push('hihi');
            $queue->push('Oupsy');
        } catch (Exception $error) {
            $this->assertSame($error->getMessage(), "Queue is full");
        }
        return $queue;
    }      
}