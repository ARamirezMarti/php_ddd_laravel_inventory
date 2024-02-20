<?php

namespace App\Modules\Shared\Application\Events;


interface EventBus
{
    public function publish(mixed $message);
    public function __destruct();
}
