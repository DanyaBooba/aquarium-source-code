<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'active',
        'idMessage',
        'idPost',
        'idUser',
        'reply',
        'idUserReply',
        'message',
    ];
}
