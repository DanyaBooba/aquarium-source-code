<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restore extends Model
{
    use HasFactory;

    protected $fillable = [
        'unixtimeCreate',
        'unixtimeToLife',
        'idUser',
        'code',
    ];
}
