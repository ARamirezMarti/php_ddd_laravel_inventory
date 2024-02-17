<?php

namespace Inventory\Application\UseCases;

use Inventory\Domain\Repository\InventoryRepository;

class DeleteInventory
{

    public function __construct(private InventoryRepository $inventoryRepository)
    {

    }
    public function __invoke(string $inventoryUuid): void
    {
        $this->inventoryRepository->delete($inventoryUuid);

    }
}
