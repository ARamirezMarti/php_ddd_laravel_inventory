<?php

namespace App\Modules\Inventory\Infrastructure\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Inventory\Application\UseCases\GetAllInventories;
use App\Modules\Inventory\Infrastructure\Http\Request\GetAllInventoriesRequest;
use Illuminate\Http\JsonResponse;
use Inventory\Infrastructure\Http\Resources\GetAllInventoriesResource;


class GetAllInventoriesController extends Controller
{
    public function __construct(private GetAllInventoriesRequest $getAllInventoriesRequest, public GetAllInventories $useCase)
    {

    }
    public function __invoke()
    {
        $criteria = $this->getAllInventoriesRequest->getCriteria();
       $inventories =  $this->useCase->__invoke($criteria);
       return new JsonResponse ( GetAllInventoriesResource::collection($inventories) ,JSONRESPONSE::HTTP_OK);
    }
}
