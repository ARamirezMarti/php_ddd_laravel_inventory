<?php

namespace App\Modules\Shared\Infrastructure\Events;

class RabbitMqConsumerConfigurator
{
    public static function getEventsByQueue(string $queue, $mappings)
    {

        $subscribers = [];

        foreach ($mappings as $subcriber) {
            $subcriber    = app()->make($subcriber);
            $subscribedTo = $subcriber->subscribedTo();

            foreach ($subscribedTo as $event) {
                $reflectedEvent      = new \ReflectionClass($event);
                $eventQueue = $reflectedEvent->getDefaultProperties()['queue'];

                if ($queue == $eventQueue) {
                    array_push($subscribers, $subcriber);
                }
            }
        }
        return $subscribers;

    }

}
