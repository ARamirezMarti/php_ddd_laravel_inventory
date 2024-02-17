<?php

namespace App\Modules\Shared\Domain\Events;

use App\Modules\Shared\Domain\Events\EventMessage;


interface EventBus
{
    public function publish(EventMessage $message);
    public function __destruct();
}
