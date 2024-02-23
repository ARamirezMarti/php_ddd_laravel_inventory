<?php

namespace App\Models;

use App\Modules\Shared\Domain\Criteria\AppliesCriteria;
use Inventory\Domain\Entity\Inventory as EntityInventory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    use AppliesCriteria;
    protected $table = 'inventory';
    public $timestamps = false;

    protected $fillable = [
        'uuid',
        'user_id',
        'name',
        'description'
    ];
    protected static $filterableFields = [
        'name'
    ];

    public static function getInventoriesByUserId($user_id){
        return self::query()->where('user_id', '=', $user_id)->get();
    }
    
    public static function deleteInventory($user_id,$inventory_id){
        return self::query()
        ->where('id', '=', $inventory_id)
        ->where('user_id', '=', $user_id)
        ->delete();
    }

    public static function fromEntity($entity):self{
        return new self([
            "uuid" => $entity->getUuid(),
            "user_id" => $entity->getUserId(),
            'name' => $entity->getName(),
            'description' => $entity->getDescription()
        ]);
    }

    public function toEntity(): EntityInventory {
        return new EntityInventory(
            $this->getAttribute('uuid'),
            $this->getAttribute('user_id'),
            $this->getAttribute('name'),
            $this->getAttribute('description'),
        );
    }


    
}
