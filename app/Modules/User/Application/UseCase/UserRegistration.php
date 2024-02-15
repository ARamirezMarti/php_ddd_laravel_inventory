<?php

namespace User\Application\UseCase;

use App\Modules\Shared\Domain\Events\EventBus;
use App\Modules\User\Domain\Entity\user;
use App\Modules\User\Domain\Hasher\DomainHasherInterface;
use App\Modules\User\Domain\Repository\UserRepository;
use App\Modules\User\Domain\Events\UserRegisteredEvent;

class UserRegistration
{
    private $hasher;

    public function __construct(public UserRepository $userRepository, DomainHasherInterface $hasher,public EventBus $eventBus)
    {
        $this->hasher = $hasher;
    }

    public function __invoke(array $UserData): void
    {
        $UserData['password'] = $this->hasher->hash($UserData['password']);
        
        $user = $this->userRepository->register($UserData);
        $event = new UserRegisteredEvent($user);
        $this->eventBus->publish($event);
        
        

    }
}
