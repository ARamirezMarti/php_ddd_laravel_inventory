<?php

namespace Inventory\Application\UseCases;

use App\Modules\Inventory\Domain\Events\userCreatedInventory;
use App\Modules\Shared\Domain\Events\EventBus;
use App\Modules\User\Domain\Repository\UserRepository;
use Inventory\Domain\Entity\Inventory;
use Inventory\Domain\Repository\InventoryRepository;

class createInventory
{
    public function __construct(private InventoryRepository $inventoryRepository, private EventBus $eventBus, private UserRepository $userRepository)
    {}
    
    public function __invoke(string $Uuid, string $user_id, string $name, string $description)
    {

        $inventory = new Inventory($Uuid, $user_id, $name, $description);

        $this->inventoryRepository->save($inventory);

        $this->eventBus->publish(new userCreatedInventory($user_id));

    }
}
