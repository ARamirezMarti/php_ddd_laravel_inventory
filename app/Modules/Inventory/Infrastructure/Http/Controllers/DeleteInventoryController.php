<?php

namespace Inventory\Infrastructure\Http\Controllers;

use App\Http\Controllers\Controller;
use Inventory\Application\UseCases\DeleteInventory;

class DeleteInventoryController extends Controller
{

    public function __construct(private DeleteInventory $useCase)
    {

    }

    public function __invoke(string $inventoryUuid)
    {
        try {
            $this->useCase->__invoke($inventoryUuid);
        } catch (\Exception $e) {
            abort(404, $e->getMessage());
        }
    }
}
