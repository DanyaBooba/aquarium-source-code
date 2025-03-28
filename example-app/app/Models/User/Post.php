<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'idPost',
        'idUser',
        'message',
        'desc',
        'haveimage',
        'imagename',
        'active'
    ];
}
