<?php


namespace App\Traits;


use App\Models\SocialUser;
use App\Models\User;

trait HasTokenAccess
{
    public function getAccessToken() {
      $tokenResult = $this->createToken('Personal Access Token');
      return $tokenResult;
    }

}
