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

        $socialUser = User::withEmail($email)->first();
        if ($socialUser !== null && $socialUser->socialTokenIsValid($authToken, $id, $idToken)) {
            $token = $socialUser->getAccessToken();
            return response()->json([
                'token' => $token,
                'user' => $socialUser->getDetails(),
            ]);
        } else {
            if (SocialUser::tokenIsValid($authToken, $id, $idToken)) {
                $socialUser = User::createSocialUser($requestArray);
                $token = $socialUser->getAccessToken();
                return response()->json([
                    'token' => $token,
                    'user' => $socialUser->getDetails()
                ]);
            }
        }

        return response()->json([
            'message' => 'Unable to Authenticate'
        ], 401);

    }
}
