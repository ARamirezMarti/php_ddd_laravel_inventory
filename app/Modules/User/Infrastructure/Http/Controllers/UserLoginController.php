<?php

namespace User\Infrastructure\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Shared\Domain\Responses\FailedResponse;
use App\Modules\Shared\Domain\Responses\OkResponse;
use App\Modules\User\Infrastructure\Http\Resource\UserResource;
use Exception;
use User\Application\UseCase\UserLogin;
use User\Infrastructure\Http\Request\UserLoginRequest;

use function abort;

class UserLoginController extends Controller
{
    public function __invoke(UserLoginRequest $request, UserLogin $useCase): FailedResponse|OkResponse
    {
        try {
            $user = $useCase->__invoke($request->input('email'), $request->input('password'));
        } catch (Exception $e) {
            abort(401, $e->getMessage());
        }

        return new OkResponse(new UserResource($user));
    }
}
