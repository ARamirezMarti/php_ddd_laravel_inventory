<?php

namespace App\Modules\Shared\Domain\Events;



interface EventBus
{
    public function publish(mixed $message);
    public function __destruct();
}
