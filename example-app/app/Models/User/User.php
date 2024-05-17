<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'verified',
        'username',
        'email',
        'password',
        'avatar',
        'avatarDefault',
        'cap',
        'capDefault',
        'firstName',
        'lastName',
        'usertype',
        'desc',
        'settings_notifications',
        'serviceLogin',
        'shareToken',
    ];
}
