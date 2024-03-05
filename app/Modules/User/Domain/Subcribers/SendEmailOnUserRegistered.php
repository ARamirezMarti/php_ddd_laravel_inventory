<?php

namespace App\Modules\User\Domain\Subcribers;

use App\Modules\Shared\Application\Subscribers\EventSubscriber;
use App\Modules\User\Domain\Events\UserRegisteredEvent;

class SendEmailOnUserRegistered implements EventSubscriber
{
    public function __construct() {}

    public function __invoke(UserRegisteredEvent $event): void
    {
        echo 'Sending email to: ' . $event->user->email;
    }

    public static function subscribedTo(): array
    {
        return [UserRegisteredEvent::class];
    }
}
