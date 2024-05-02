<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verify extends Model
{
    use HasFactory;

    protected $fillable = [
        'iduser',
        'email',
        'code',
        'unixtime',
    ];
}
