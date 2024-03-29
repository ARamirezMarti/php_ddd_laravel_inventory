<?php

namespace Inventory\Infrastructure\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Inventory\Application\UseCases\createInventory;
use Inventory\Infrastructure\Http\Request\CreateInventoryRequest;

class CreateInventoryController extends Controller
{
    public function __invoke(CreateInventoryRequest $request, string $inventoryUuid, createInventory $useCase)
    {
        $useCase->__invoke($inventoryUuid, $request->get('user_id'), $request->get('name'), $request->get('description'));

        return new JsonResponse(null, JsonResponse::HTTP_CREATED);
    }
}
