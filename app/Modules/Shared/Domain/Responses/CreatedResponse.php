<?php

namespace App\Modules\Shared\Domain\Responses;

use Illuminate\Http\JsonResponse;

class CreatedResponse extends JsonResponse
{
    public function __construct($data)
    {
        parent::__construct($data, JsonResponse::HTTP_CREATED);
    }
}
