<?php

namespace App\Modules\User\Domain\Entity;

class user
{
    public function __construct(
        public string $name,
        public string $lastname,
        public string $email,
        public string $password
    ){

    }
}
