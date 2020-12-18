<?php

namespace App\Models;

use App\Traits\HasEmail;
use App\Traits\HasSocialUser;
use App\Traits\HasTokenAccess;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * @method static withEmail($email)
 * @method static create(array $array)
 * @property mixed first_name
 * @property mixed last_name
 * @property mixed name
 * @property mixed email
 * @property mixed phone
 * @property mixed social_photo_link
 *
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasEmail, HasSocialUser, HasTokenAccess, HasApiTokens;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'first_name',
        'last_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getDetails()
    {
        return [
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'SocialPhotoLink' =>  $this->social_photo_link,
        ];

    }

}
