<?php

namespace App\Modules\User\Domain\Exceptions;

use Exception;

class UserNotFoundException extends Exception
{
    public $message = 'User does not exist';
}
