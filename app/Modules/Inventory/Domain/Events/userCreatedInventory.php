<?php

namespace App\Modules\Inventory\Domain\Events;

use App\Modules\Shared\Domain\Events\EventMessage;

class userCreatedInventory extends EventMessage
{

    public string $queue = "inventory.inventory.1.user.created.inventory";
    public string $routingKey   = 'inventory.inventory.1.created.inventory';
    public string $exchange     = 'inventory';

    public function __construct( public string $id,public string $user_id)
    {
    }

}
