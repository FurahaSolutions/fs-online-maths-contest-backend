<?php


namespace App\Traits;


use App\Models\SocialUser;
use App\Models\User;

trait HasSocialUser
{
    public function socialUser()
    {
        return $this->hasMany(SocialUser::class);
    }

    public static function createSocialUser($requestArray)
    {
        $newUser = User::create([
            'email' => $requestArray['email'],
            'first_name' => $requestArray['firstName'],
            'last_name' => $requestArray['lastName'],
            'name' => $requestArray['name'],
            'password' => $requestArray['authToken'],
        ]);

        $newUser->socialUser()->create([
            'provider' => $requestArray['provider'],
            'photo_url' => $requestArray['photoUrl'],
            'name' => $requestArray['name'],
            'is_prof_pic' => true
        ]);

        return $newUser;
    }

    public function socialTokenIsValid($authToken, $id, $idToken)
    {
        return true; // TODO-me-important! Validate token
    }

    public function getSocialPhotoLinkAttribute()
    {
        $socialUserDetails = $this->socialUser()->where('is_prof_pic', true)->first();
        if ($socialUserDetails == null) {
            return '';
        }

        return $socialUserDetails->photo_url;

    }

}
