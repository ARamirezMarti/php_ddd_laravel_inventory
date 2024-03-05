<?php

namespace App\Modules\User\Domain\Exceptions;

use Exception;

class UserInvalidCredentialsException extends Exception
{
    public $message = 'Invalid credentials';
}
