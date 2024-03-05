<?php

namespace App\Modules\Shared\Infrastructure;

use App\Modules\Shared\Domain\UuidGenerator;
use Ramsey\Uuid\Uuid;

class RamseyUuidCreator implements UuidGenerator
{
    public function createUuid(): string
    {
        return Uuid::uuid4()->toString();
    }
}
