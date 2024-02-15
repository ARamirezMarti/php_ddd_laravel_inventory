<?php

namespace App\Modules\User\Domain\Events;
use App\Modules\Shared\Domain\Events\EventMessage;

class UserRegisteredEvent extends EventMessage
{

    public $queue = "inventory.user.1.user.registered";
    public $routingKey = 'inventory.user.1.user.registered';
    public $exchange = 'user';
    
    public function __construct($message){
        parent::__construct($message);
    }

    public function __invoke(){
        echo "Email sent to: ".$this->message->email."\n";
    }
}
