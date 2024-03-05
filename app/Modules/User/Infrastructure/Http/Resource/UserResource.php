<?php

namespace App\Modules\User\Infrastructure\Http\Resource;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        $user = User::find($this->id);

        return [
            'token' => $user->createToken('Personal Access Token')->plainTextToken,
        ];
    }
}
