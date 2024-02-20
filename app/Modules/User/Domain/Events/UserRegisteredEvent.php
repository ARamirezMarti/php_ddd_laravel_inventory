<?php

namespace App\Modules\User\Domain\Events;

use App\Modules\Shared\Domain\Events\EventMessage;

class UserRegisteredEvent extends EventMessage
{

    public string $queue      = "inventory.user.1.user.registered";
    public string $routingKey = 'inventory.user.1.user.registered';
    public string $exchange   = 'user';

    public function __construct( public string $id,public object $user)
    {
    }

}
