<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    public function all()
    {
        $users = User::select($this->selectFields())->where('verified', true)->where('usertype', '<>', 100)->get();
        return $users;
    }

    public function id($id)
    {
        $user = User::select($this->selectFields())->where('id', $id)->where('verified', true)->where('usertype', '<>', 100)->first();
        if ($user == null) return "{}";
        return $user;
    }

    public function nickname($nickname)
    {
        $user = User::select($this->selectFields())->where('username', $nickname)->where('verified', true)->where('usertype', '<>', 100)->first();
        if ($user == null) return "{}";
        return $user;
    }

    private function selectFields()
    {
        return ['id', 'username', 'firstName', 'lastName', 'avatar', 'cap', 'desc', 'sub', 'subs', 'achivs'];
    }
}
