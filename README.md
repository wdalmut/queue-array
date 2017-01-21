# AWS SQS adapter

To use this package you need `Corley\Queue\Queue`

[![Build Status](https://travis-ci.org/wdalmut/queue-array.svg?branch=master)](https://travis-ci.org/wdalmut/queue-array)

```sh
composer require corley/queue:~1
```

## Use as adapter

```php
use Corley\Queue\Queue;
use Corley\Queue\ArrayAdapter\ArrayAdapter;

$adapter = new ArrayAdapter();

$queue = new Queue("example", $adapter);
$queue->send(json_encode(["test" => "ok"]));

list($receipt, $message) = $queue->receive();
$message = json_decode($message, true);

$queue->delete($receipt);
```


