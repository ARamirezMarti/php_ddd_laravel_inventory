<?php

namespace Inventory\Application\UseCases;

use App\Modules\Inventory\Domain\Events\userDeletedInventory;
use App\Modules\Shared\Application\Events\EventBus;
use App\Modules\Shared\Domain\UuidGenerator;
use Inventory\Domain\Repository\InventoryRepository;

class DeleteInventory
{
    public function __construct(private InventoryRepository $inventoryRepository, private EventBus $eventBus, private UuidGenerator $uuidGenerator) {}

    public function __invoke(string $inventoryUuid, string $user_id): void
    {
        $this->inventoryRepository->delete($inventoryUuid);
        $this->eventBus->publish(new userDeletedInventory($this->uuidGenerator->createUuid(), $user_id));
    }
}
