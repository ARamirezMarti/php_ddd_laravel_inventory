<?php

namespace User\Infrastructure\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Shared\Domain\Responses\CreatedResponse;
use User\Application\UseCase\UserRegistration;
use User\Infrastructure\Http\Request\UserRegisterRequest;


class UserRegistrationController extends Controller
{
    public function __invoke(UserRegisterRequest $request, UserRegistration $useCase)
    {
        $useCase->__invoke($request->all());
        return new CreatedResponse(null);
    }
}
