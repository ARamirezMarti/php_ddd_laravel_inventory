<?php

namespace Inventory\Infrastructure\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Inventory\Application\UseCases\DeleteInventory;

use function abort;

class DeleteInventoryController extends Controller
{
    public function __construct(private Request $request, private DeleteInventory $useCase) {}

    public function __invoke(string $inventoryUuid): void
    {
        try {
            $this->useCase->__invoke($inventoryUuid, $this->request->get('user_id'));
        } catch (Exception $e) {
            abort(404, $e->getMessage());
        }
    }
}
