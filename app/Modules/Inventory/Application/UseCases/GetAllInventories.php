<?php

namespace App\Modules\Inventory\Application\UseCases;

use Inventory\Domain\Repository\InventoryRepository;

class GetAllInventories
{
    public function __construct(private InventoryRepository $inventoryRepository) {}

    public function __invoke(array $criteria)
    {
        $inventories = $this->inventoryRepository->findByCriteria($criteria);

        return $inventories;
    }
}
