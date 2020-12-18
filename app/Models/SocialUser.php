<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialUser extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['provider', 'photo_url', 'name', 'is_prof_pic'];

    public static function tokenIsValid($authToken, $id, $idToken) {
        return true; // TODO-me-important! Validate token
    }
}
