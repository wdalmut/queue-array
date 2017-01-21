<?php
namespace Corley\Queue\ArrayAdapter;

use Corley\Queue\QueueInterface;

class ArrayAdapter implements QueueInterface
{
    private $queue;

    public function __construct(array &$queue = [])
    {
        $this->queue = $queue;
    }

    public function send($queueName, $message, array $options)
    {
        if (!array_key_exists($queueName, $this->queue)) {
            $this->queue[$queueName] = [];
        }

        return array_push($this->queue[$queueName], $message);
    }

    public function receive($queueName, array $options)
    {
        if (!array_key_exists($queueName, $this->queue)) {
            $this->queue[$queueName] = [];
        }

        return [rand(0,100000), array_pop($this->queue[$queueName]), $this->queue[$queueName]];
    }

    public function delete($queueName, $receipt, array $options) {}
}

