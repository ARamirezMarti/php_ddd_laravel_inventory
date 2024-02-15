<?php

namespace App\Modules\Inventory\Infrastructure\Http\Repository;

use App\Models\Inventory as InventoryModel;
use App\Modules\Inventory\Domain\Entity\Inventory;
use App\Modules\Inventory\Domain\Repository\InventoryRepository;

class EloquentInventoryRepository implements InventoryRepository
{
    public function save(Inventory $inventory): void
    {
        $model = InventoryModel::fromEntity($inventory);

        $model->save();
    }

}
