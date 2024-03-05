<?php

namespace App\Models;

use App\Modules\Shared\Domain\Criteria\AppliesCriteria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Inventory\Domain\Entity\Inventory as EntityInventory;

class Inventory extends Model
{
    use HasFactory;
    use AppliesCriteria;
    public $timestamps = false;
    protected $table = 'inventory';

    protected $fillable = [
        'uuid',
        'user_id',
        'name',
        'description',
    ];
    protected static $filterableFields = [
        'name',
    ];

    public static function fromEntity($entity): self
    {
        return new self([
            'uuid' => $entity->getUuid(),
            'user_id' => $entity->getUserId(),
            'name' => $entity->getName(),
            'description' => $entity->getDescription(),
        ]);
    }

    public function toEntity(): EntityInventory
    {
        return new EntityInventory(
            $this->getAttribute('uuid'),
            $this->getAttribute('user_id'),
            $this->getAttribute('name'),
            $this->getAttribute('description'),
        );
    }
}
