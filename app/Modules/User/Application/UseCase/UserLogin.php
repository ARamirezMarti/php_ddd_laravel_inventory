<?php

namespace User\Application\UseCase;
use App\Modules\User\Domain\Hasher\DomainHasherInterface;
use App\Modules\User\Domain\Repository\UserRepository;

class UserLogin
{
    public function __construct(
        private UserRepository $userRepository,
        private DomainHasherInterface $hasher,
    ) {

    }

    public function __invoke(string $userEmail, string $userPass)
    {

        $user = $this->userRepository->findByEmail($userEmail);
        $this->hasher->validate($userPass, $user->password);
        return $user;
    }
}
