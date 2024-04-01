<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function index($id)
    {
        $findUserSession = User::where('email', session('email'))->first();

        $findUser = User::where('id', $id)->where('email', '<>', session('email'))->first();

        if ($findUser === null) {
            return redirect()->back();
        }

        $subs = (array) json_decode($findUserSession->subsJson);

        $issub = in_array($id, $subs);

        if (!$issub) {
            // dd('sub');
            array_push($subs, intval($id));

            $findUserSession->subsJson = $subs;
            $temp = $findUserSession->subs;
            $findUserSession->subs = $temp + 1;

            $findUserSession->save();
        } else {
            // dd('unsub');
            dd(array_diff([312, 401, 15, 401, 3], [401]));

            $findUserSession->subsJson = $subs;
            $temp = $findUserSession->subs;
            $findUserSession->subs = math_min_zero($temp - 1);

            $findUserSession->save();
        }

        // dd($subs);

        return redirect()->back();
    }
}
