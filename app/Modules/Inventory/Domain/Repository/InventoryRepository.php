<?php

namespace Inventory\Domain\Repository;

use Inventory\Domain\Entity\Inventory;

interface InventoryRepository
{
    public function save(Inventory $inventory): void;

    public function delete(string $inventoryUuid): void;

    public function findByUuid(string $inventoryUuid): Inventory;

    public function findByCriteria(array $Criteria): array;
}
