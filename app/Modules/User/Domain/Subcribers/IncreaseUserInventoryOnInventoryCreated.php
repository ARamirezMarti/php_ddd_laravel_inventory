<?php

namespace App\Modules\User\Domain\Subcribers;

use App\Modules\Inventory\Domain\Events\userCreatedInventory;
use App\Modules\Shared\Application\Subscribers\EventSubscriber;
use App\Modules\User\Application\UseCase\UserInventoryIncrease;

class IncreaseUserInventoryOnInventoryCreated implements EventSubscriber
{
    public function __construct(public UserInventoryIncrease $userInventoryIncreasUseCase) {}

    public function __invoke(userCreatedInventory $event): void
    {
        $this->userInventoryIncreasUseCase->__invoke($event->user_id);
    }

    public static function subscribedTo(): array
    {
        return [userCreatedInventory::class];
    }
}
