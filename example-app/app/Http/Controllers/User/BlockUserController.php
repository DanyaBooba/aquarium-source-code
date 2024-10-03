<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Block;
use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlockUserController extends Controller
{
    public function index()
    {
        $userSession = User::where('email', session('email'))->first();
        $blockInfo = Block::where('idUser', $userSession->id)->first();

        $datetime = Carbon::now();
        $datetime->setTimezone('UTC');
        $forever = 1;
        if ($blockInfo) {
            $datetime = $blockInfo->datetime;
            $forever = $blockInfo->forever;
        }

        return view('user.blocked', [
            'forever' => $forever,
            'datetime' => $datetime->format('d/m/y в H:i:s'),
        ]);
    }
}
