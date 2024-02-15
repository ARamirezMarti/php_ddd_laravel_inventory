<?php

namespace App\Modules\User\Infrastructure\MessageBus;
use App\Modules\Shared\Domain\Events\EventBus;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;


class RabbitMqMessageBus implements EventBus
{
    protected $connection;
    public $channel;

    public function __construct(){
        $this->connection = new AMQPStreamConnection(
            env('RABBITMQ_HOST'),
            env('RABBITMQ_PORT'),
            env('RABBITMQ_LOGIN'),
            env('RABBITMQ_PASSWORD'),
        );
        $this->channel = $this->connection->channel();

    }
    public function generateQueue(string $queue){
        $this->channel->queue_declare($queue, false, true, false, false);

    }
    public function generateExchanges(string $exchange){
        $this->channel->exchange_declare($exchange, 'direct', false, true, false);
    }

    public function publish($event)
    {
        $event->id = 4;
        $msg = new AMQPMessage($event->serialize());
        $this->channel = $this->connection->channel();
        $this->channel->queue_bind($event->queue, $event->exchange, $event->routingKey);
        
        $this->channel->basic_publish($msg, $event->exchange, $event->routingKey);
    }


    public function __destruct()
    {
        $this->channel->close();
        $this->connection->close();
    }
}
