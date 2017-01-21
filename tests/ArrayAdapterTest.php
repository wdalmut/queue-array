<?php
namespace Corley\Queue\ArrayAdapter;

class ArrayAdapterTest extends \PHPUnit_Framework_TestCase
{
    private $queue = [];
    private $adapter;

    public function setUp()
    {
        $this->queue = [];
        $this->adapter = new ArrayAdapter($this->queue);
    }

    public function testSendReceiveMessage()
    {
        $this->adapter->send("queue_name", "test", []);
        list($receipt, $message) = $this->adapter->receive("queue_name", []);

        $this->assertEquals("test", $message);
        $this->assertNotNull($receipt);
        $this->assertNotFalse($receipt);
    }

    public function testDeleteIsNotEngaged()
    {
        $this->adapter->delete("queue_test", "adgh", []);
    }
}
