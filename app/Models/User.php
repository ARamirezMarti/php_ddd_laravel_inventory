<?php

namespace App\Models;

use App\Modules\User\Domain\Entity\user as EntityUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
        'inventories_count',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function toEntity(): EntityUser
    {
        return new EntityUser(
            $this->id,
            $this->name,
            $this->lastname,
            $this->email,
            $this->password,
        );
    }

    public static function fromEntity($entity): self
    {
        return new self(
            [
                'id'       => $entity->id,
                'name'     => $entity->name,
                'lastname' => $entity->lastname,
                'email'    => $entity->email,
                'password' => $entity->password,
            ],
        );
    }
}
