<?php

namespace App\Modules\User\Domain\Subcribers;

use App\Modules\Shared\Application\Subscribers\EventSubscriber;
use App\Modules\User\Domain\Events\UserRegisteredEvent;

class SendEmailOnUserRegistered implements EventSubscriber
{
    public function __construct(){

    }
    public static function subscribedTo(): array
    {
        return [ UserRegisteredEvent::class ];
    }
    public function __invoke(UserRegisteredEvent $event){    
       echo "Sending email to: ". $event->user->email;
    }
}
