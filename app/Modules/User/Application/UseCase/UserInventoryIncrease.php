<?php

namespace App\Modules\User\Application\UseCase;

use App\Modules\User\Domain\Repository\UserRepository;

class UserInventoryIncrease
{
    public function __construct(private UserRepository $userRepository) {}

    public function __invoke($user_id): void
    {
        $this->userRepository->increaseInventory($user_id);
    }
}
