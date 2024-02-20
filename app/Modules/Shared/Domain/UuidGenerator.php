<?php

namespace App\Modules\Shared\Domain;

interface UuidGenerator
{
    public function createUuid(): string;
}
