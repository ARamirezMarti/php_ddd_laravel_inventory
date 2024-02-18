<?php

namespace App\Modules\Shared\Infrastructure\Events;

use App\Modules\User\Domain\Subcribers\IncreaseUserInventoryOnInventoryCreated;
use App\Modules\User\Domain\Subcribers\SendEmailOnUserRegistered;

class EventsMapping
{
    public static function getRabbitMqSubscribers(): array
    {
        return [
            IncreaseUserInventoryOnInventoryCreated::class,
            SendEmailOnUserRegistered::class,
        ];
    }
}
