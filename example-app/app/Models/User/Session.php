<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
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
