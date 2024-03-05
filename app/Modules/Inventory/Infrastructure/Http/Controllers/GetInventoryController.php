<?php

namespace Inventory\Infrastructure\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Inventory\Application\UseCases\GetInventory;
use Inventory\Infrastructure\Http\Resources\InventoryResource;

use function abort;

class GetInventoryController extends Controller
{
    public function __construct(private GetInventory $useCase) {}

    public function __invoke(string $inventoryUuid)
    {
        try {
            $inventory = $this->useCase->__invoke($inventoryUuid);
        } catch (Exception $e) {
            abort(404, $e->getMessage());
        }

        return new JsonResponse(new InventoryResource($inventory), JsonResponse::HTTP_OK);
    }
}
