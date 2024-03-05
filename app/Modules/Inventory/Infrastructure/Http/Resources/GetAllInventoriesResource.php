<?php

namespace Inventory\Infrastructure\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GetAllInventoriesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'uuid'        => $this->getUuid(),
            'user_id'     => $this->getUserId(),
            'name'        => $this->getName(),
            'description' => $this->getDescription(),
        ];
    }
}
