<?php

namespace Inventory\Application\UseCases;

use Inventory\Domain\Entity\Inventory;
use Inventory\Domain\Repository\InventoryRepository;

class GetInventory
{
    public function __construct(private InventoryRepository $inventoryRepository)
    {}
    
    public function __invoke(string $inventoryUuid): Inventory
    {
        return $this->inventoryRepository->findByUuid($inventoryUuid);

    }
}
