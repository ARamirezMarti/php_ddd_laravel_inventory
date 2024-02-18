<?php

namespace App\Modules\Shared\Domain\Events;

abstract class EventMessage
{
    public string $queue ="";
    public string $id;
    public string $routingKey;
    public string $exchange;

    public function __construct()
    {
    }

    public function serialize()
    {
        return serialize($this);
    }

}
