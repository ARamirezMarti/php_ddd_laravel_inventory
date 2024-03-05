<?php

namespace App\Modules\Shared\Application\Events;

interface EventBus
{
    public function __destruct();

    public function publish(mixed $message);
}
