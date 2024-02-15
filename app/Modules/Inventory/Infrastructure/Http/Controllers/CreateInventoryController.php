<?php

namespace App\Modules\Inventory\Infrastructure\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Inventory\Application\UseCases\createInventory;
use Illuminate\Http\Request;

class CreateInventoryController extends Controller
{
    public function __invoke(Request $request, string $inventoryUuid,createInventory $useCase)
    {
        $useCase->__invoke($inventoryUuid,$request->get('user_id'),$request->get('name'),$request->get('description'));
    }
}
