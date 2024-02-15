<?php

namespace App\Modules\Inventory\Domain\Repository;

use App\Modules\Inventory\Domain\Entity\Inventory;

interface InventoryRepository
{
    public function save( Inventory $inventory): void ;
}
