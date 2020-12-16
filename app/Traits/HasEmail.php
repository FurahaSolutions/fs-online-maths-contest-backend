<?php


namespace App\Traits;


trait HasEmail
{
    public static function scopeWithEmail($query, $email)
    {
        return $query->where('email', $email);
    }

}
