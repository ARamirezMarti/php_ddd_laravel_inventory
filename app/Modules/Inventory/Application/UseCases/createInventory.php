<?php

namespace Inventory\Application\UseCases;

use App\Modules\Inventory\Domain\Events\userCreatedInventory;
use App\Modules\Shared\Application\Events\EventBus;
use App\Modules\Shared\Domain\UuidGenerator;
use Inventory\Domain\Entity\Inventory;
use Inventory\Domain\Repository\InventoryRepository;

class createInventory
{
    public function __construct(
        private InventoryRepository $inventoryRepository,
        private EventBus $eventBus,
        private UuidGenerator $uuidGenerator,
    ) {}

    public function __invoke(string $Uuid, string $user_id, string $name, string $description): void
    {
        $inventory = new Inventory($Uuid, $user_id, $name, $description);

        $this->inventoryRepository->save($inventory);

        $this->eventBus->publish(new userCreatedInventory($this->uuidGenerator->createUuid(), $user_id));
    }
}
