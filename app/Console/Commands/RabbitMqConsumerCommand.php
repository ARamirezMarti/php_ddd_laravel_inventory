<?php

namespace App\Console\Commands;

use App\Modules\Shared\Infrastructure\Events\EventsMapping;
use App\Modules\Shared\Infrastructure\Events\MessageBus\RabbitMqMessageBus;
use App\Modules\Shared\Infrastructure\Events\RabbitMqConsumerConfigurator;
use Exception;
use Illuminate\Console\Command;

use function unserialize;

class RabbitMqConsumerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rmq:consumer {queue}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'RabbitMQ Consumer';
    private $queue;

    public function handle()
    {
        $this->queue = $this->argument('queue');

        $subscribers = RabbitMqConsumerConfigurator::getEventsByQueue($this->queue, EventsMapping::getRabbitMqSubscribers());

        foreach ($subscribers as $subscriber) {
            $rabbitMq = new RabbitMqMessageBus();

            $channel = $rabbitMq->channel;

            echo ' [*] Waiting for messages on queue ' . $this->queue . " To exit press CTRL+C\n";

            $callback = function ($msg) use ($subscriber): void {
                $event = unserialize($msg->body);
                $subscriber->__invoke($event);

                $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
            };

            $channel->basic_qos(null, 1, null);

            try {
                $channel->basic_consume(
                    $this->queue,
                    '',
                    false,
                    false,
                    false,
                    false,
                    $callback,
                );
            } catch (Exception $e) {
                $this->error($e->getMessage());
            }

            while ($channel->is_consuming()) {
                $channel->wait();
            }

            $channel->close();
        }

        return Command::SUCCESS;
    }
}
