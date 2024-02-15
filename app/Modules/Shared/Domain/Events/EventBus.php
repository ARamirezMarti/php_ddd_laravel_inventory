<?php

namespace App\Modules\Shared\Domain\Events;

interface EventBus
{
    public function publish($message);
    public function __destruct();
}
