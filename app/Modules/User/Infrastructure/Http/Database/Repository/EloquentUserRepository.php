<?php

namespace App\Modules\User\Infrastructure\Http\Database\Repository;
use App\Models\User;
use App\Modules\User\Domain\Entity\user as EntityUser;
use App\Modules\User\Domain\Exceptions\UserNotFoundException;
use App\Modules\User\Domain\Repository\UserRepository;

class EloquentUserRepository implements UserRepository
{
    public function register(array $UserData ): EntityUser
    {
        $user = User::create($UserData);
        return $user->toEntity();
    }

    public function findByEmail(string $email): EntityUser
    {
        $User = User::query()->where('email',$email)->first();

        if (null == $User) {
            throw new UserNotFoundException;
        }
        
        return $User->toEntity();
    }

    public function increaseInventory(string $user_id): void {

        $user = User::query()->where('id',$user_id)->first();
        
        $user->update(['inventories_count' => $user->inventories_count+1]);

    } 

}
