<?php

namespace App\Modules\User\Domain\Repository;

use App\Modules\User\Domain\Entity\user as EntityUser;

interface UserRepository
{
    public function register(array $Data):EntityUser;
    public function findByEmail(string $email): EntityUser;
    public function increaseInventory(string $user_id): void;
}
