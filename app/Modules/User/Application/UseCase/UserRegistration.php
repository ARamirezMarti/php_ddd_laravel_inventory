<?php

namespace User\Application\UseCase;

use App\Modules\Shared\Domain\Events\EventBus;
use App\Modules\Shared\Domain\UuidGenerator;
use App\Modules\User\Domain\Entity\user;
use App\Modules\User\Domain\Events\UserRegisteredEvent;
use App\Modules\User\Domain\Hasher\DomainHasherInterface;
use App\Modules\User\Domain\Repository\UserRepository;

class UserRegistration
{

    public function __construct(
        private UserRepository $userRepository,
        private DomainHasherInterface $hasher,
        private EventBus $eventBus,
        private UuidGenerator $uuidGenerator
    ) {
        $this->hasher = $hasher;
    }

    public function __invoke(array $UserData): void
    {
        $UserData['password'] = $this->hasher->hash($UserData['password']);

        $user = $this->userRepository->register($UserData);

        $this->eventBus->publish(new UserRegisteredEvent(
            $this->uuidGenerator->createUuid(), 
            $user
        ));

    }
}
