<?php

namespace App\Modules\User\Domain\Hasher;

interface DomainHasherInterface
{
    public function hash(string $content): string;

    public function validate(string $password, string $hashedPassword): bool;
}
