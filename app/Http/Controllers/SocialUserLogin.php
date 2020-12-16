<?php

namespace App\Http\Controllers;

use App\Http\Requests\SocialUserLoginRequest;
use App\Models\SocialUser;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class SocialUserLogin extends Controller
{
    /**
     * @param SocialUserLoginRequest $request
     * @return JsonResponse
     */
    function login(SocialUserLoginRequest $request)
    {
        $requestArray = $request->all();
        $authToken = $requestArray['authToken'];
        $email = $requestArray['email'];
        $id = $requestArray['id'];
        $idToken = $requestArray['idToken'];

        $user = User::withEmail($email)->first();
        if ($user !== null && $user->socialTokenIsValid($authToken, $id, $idToken)) {
            return response()->json($user->getAccessToken());
        } else {
            if (SocialUser::tokenIsValid($authToken, $id, $idToken)) {
                $user = User::createSocialUser($requestArray);
                return response()->json($user->getAccessToken());
            }
        }

        return response()->json([
            'message' => 'Unable to Authenticate'
        ], 401);

    }
}
