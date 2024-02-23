<?php

namespace Inventory\Infrastructure\Http\Repository;

use App\Models\Inventory as InventoryModel;
use Inventory\Domain\Entity\Inventory;
use Inventory\Domain\Exceptions\InventoryNotFoundException;
use Inventory\Domain\Repository\InventoryRepository;

class EloquentInventoryRepository implements InventoryRepository
{
    public function save(Inventory $inventory): void
    {
        $model = InventoryModel::fromEntity($inventory);

        $model->save();
    }
    public function delete(string $inventoryUuid): void
    {
        $model = InventoryModel::query()->where('uuid',$inventoryUuid)->first();
        if(!$model){
            throw new InventoryNotFoundException('Inventory not found');
        }
        $model->delete();
    }

    public function findByUuid(string $inventoryUuid): Inventory
    {
        $model = InventoryModel::query()->where('uuid',$inventoryUuid)->first();
        if(!$model){
            throw new InventoryNotFoundException('Inventory not found');
        }
        return $model->toEntity();
    }

    public function findByCriteria(array $Criteria): array {

        $inventories = InventoryModel::searchWithCriteria($Criteria)->get();

        return $inventories->map->toEntity()->toArray();
    }

    


}
