<?php

namespace App\Modules\User\Domain\Subcribers;

use App\Modules\Inventory\Domain\Events\userDeletedInventory;
use App\Modules\Shared\Application\Subscribers\EventSubscriber;
use App\Modules\User\Domain\Repository\UserRepository;

class decreaseUserInventoryOnInventoryDeleted implements EventSubscriber
{
    public function __construct(private UserRepository $userRepository) {}

    public function __invoke(userDeletedInventory $event): void
    {
        $this->userRepository->decreaseInventory($event->user_id);
    }

    public static function subscribedTo(): array
    {
        return [userDeletedInventory::class];
    }
}
