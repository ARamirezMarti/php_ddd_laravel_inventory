<?php

namespace App\Modules\Shared\Infrastructure\Events\MessageBus;

use App\Modules\Shared\Application\Events\EventBus;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

use function env;

class RabbitMqMessageBus implements EventBus
{
    public $channel;
    protected $connection;

    public function __construct()
    {
        $this->connection = new AMQPStreamConnection(
            env('RABBITMQ_HOST'),
            env('RABBITMQ_PORT'),
            env('RABBITMQ_LOGIN'),
            env('RABBITMQ_PASSWORD'),
        );
        $this->channel = $this->connection->channel();
    }

    public function __destruct()
    {
        $this->channel->close();
        $this->connection->close();
    }

    public function generateQueue(string $queue): void
    {
        $this->channel->queue_declare($queue, false, true, false, false);
    }

    public function generateExchanges(string $exchange): void
    {
        $this->channel->exchange_declare($exchange, 'direct', false, true, false);
    }

    public function publish(mixed $event): void
    {
        $msg           = new AMQPMessage($event->serialize());
        $this->channel = $this->connection->channel();
        $this->channel->queue_bind($event->queue, $event->exchange, $event->routingKey);
        $this->channel->basic_publish($msg, $event->exchange, $event->routingKey);
    }
}
