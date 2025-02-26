<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'idUser',
        'token',
        'refreshToken',
        'unixtime_start',
        'unixtime_stop',
    ];
}
