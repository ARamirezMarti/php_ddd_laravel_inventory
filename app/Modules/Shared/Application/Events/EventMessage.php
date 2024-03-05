<?php

namespace App\Modules\Shared\Application\Events;

use function serialize;

abstract class EventMessage
{
    public string $queue = '';
    public string $routingKey;
    public string $exchange;

    public function __construct(
        public string $id,
    ) {}

    public function serialize()
    {
        return serialize($this);
    }
}
