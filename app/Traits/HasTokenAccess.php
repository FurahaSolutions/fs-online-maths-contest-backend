<?php


namespace App\Traits;


use App\Models\SocialUser;
use App\Models\User;

trait HasTokenAccess
{
    public function getAccessToken() {
        $token = $this->createToken('Personal Access Token');
        return [
            'accessToken' => $token->accessToken,
            'expiresAt' => $token->token['expires_at']
        ];
    }

}
