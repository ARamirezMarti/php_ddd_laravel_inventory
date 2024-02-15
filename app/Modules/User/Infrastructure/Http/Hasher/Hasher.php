<?php

namespace App\Modules\User\Infrastructure\Http\Hasher;

use App\Modules\User\Domain\Exceptions\UserInvalidCredentialsException;
use App\Modules\User\Domain\Hasher\DomainHasherInterface;
use Illuminate\Support\Facades\Hash;

class Hasher implements DomainHasherInterface
{
    public function hash(string $content): string{

        return Hash::make($content);;
    }
    public function validate(string $password,string $hashedPassword): bool{

        $isCorrect = Hash::check($password,$hashedPassword) ;

        if (!$isCorrect) {
           throw new UserInvalidCredentialsException;
        }

        return $isCorrect;
        
    }
}
