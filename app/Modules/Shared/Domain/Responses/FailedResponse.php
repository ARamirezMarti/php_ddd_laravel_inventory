<?php

namespace App\Modules\Shared\Domain\Responses;

use App\Modules\User\Domain\Exceptions\UserInvalidCredentialsException;
use App\Modules\User\Domain\Exceptions\UserNotFoundException;
use Illuminate\Http\JsonResponse;

class FailedResponse extends JsonResponse
{
    public function __construct($data ){
        $status = $this->handleFailedReason($data);
        parent::__construct($data, $status);
    }

    public function handleFailedReason($data)
    {
        switch (true) {
            case $data instanceof UserInvalidCredentialsException:
                return JsonResponse::HTTP_FORBIDDEN;
            case $data instanceof UserNotFoundException:
                return JsonResponse::HTTP_NOT_FOUND;
            
      
        }
        
        return $data;

    }
}
