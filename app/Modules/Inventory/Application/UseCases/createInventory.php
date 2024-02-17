<?php

namespace Inventory\Application\UseCases;

use Inventory\Domain\Entity\Inventory;
use Inventory\Domain\Repository\InventoryRepository;

class createInventory
{
    public function __construct(private InventoryRepository $inventoryRepository)
    {}
    
    public function __invoke(string $Uuid, string $user_id, string $name, string $description)
    {

        $inventory = new Inventory($Uuid, $user_id, $name, $description);

        $this->inventoryRepository->save($inventory);

    }
}
