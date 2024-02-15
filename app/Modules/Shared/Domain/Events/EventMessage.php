<?php

namespace App\Modules\Shared\Domain\Events;

abstract class EventMessage
{
    public string $id;
    public  $message;
    public  $queue;
    public $routingKey;
    
    public function __construct($message){
        $this->message = $message;
    }
    public function serialize()
    {
        return serialize($this);
    }
}
