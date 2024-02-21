<?php

namespace App\Modules\Inventory\Domain\Events;

use App\Modules\Shared\Application\Events\EventMessage;

class userDeletedInventory extends EventMessage
{
    public string $queue = "inventory.inventory.1.user.deleted.inventory";    
    public string $routingKey = "inventory.inventory.1.user.deleted.inventory";
    public string $exchange = 'inventory';

    public function __construct(
        public string $id,
        public string $user_id
    )
    {
    }

}
