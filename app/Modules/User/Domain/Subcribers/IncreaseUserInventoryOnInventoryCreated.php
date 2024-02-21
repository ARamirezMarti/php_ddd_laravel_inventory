<?php

namespace App\Modules\User\Domain\Subcribers;

use App\Modules\Inventory\Domain\Events\userCreatedInventory;
use App\Modules\Shared\Application\Subscribers\EventSubscriber;
use App\Modules\User\Application\UseCase\UserInventoryIncrease;

class IncreaseUserInventoryOnInventoryCreated implements EventSubscriber
{
    public function __construct(public UserInventoryIncrease $userInventoryIncreasUseCase)
    {

    }
    public static function subscribedTo(): array
    {
        return [userCreatedInventory::class];
    }
    public function __invoke(userCreatedInventory $event)
    {
        $this->userInventoryIncreasUseCase->__invoke($event->user_id);
    }
}
