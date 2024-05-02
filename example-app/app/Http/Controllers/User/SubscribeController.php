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

        if ($findUserSession->usertype === -1 || $findUser->usertype === -1) return redirect()->back();

        if ($findUser === null) {
            return redirect()->back();
        }

        $countSub = $findUserSession->sub;
        $countSubs = $findUser->subs;
        $sub = (array) json_decode($findUserSession->subJson);
        $subs = (array) json_decode($findUser->subsJson);

        $issub = in_array($id, $sub);

        if ($issub) {
            // dd("need to sub");

            array_splice($sub, array_search(intval($id), $sub), 1);
            array_splice($subs, array_search(intval($findUserSession->id), $subs), 1);

            $tempCountSub = math_min_zero($countSub - 1);
            $tempCountSubs = math_min_zero($countSubs - 1);;
        } else {
            // dd("unsub");

            array_push($sub, intval($id));
            array_push($subs, intval($findUserSession->id));

            $tempCountSub = $countSub + 1;
            $tempCountSubs = $countSubs + 1;
        }

        $findUserSession->subJson = json_encode($sub);
        $findUserSession->sub = $tempCountSub;
        $findUserSession->save();

        $findUser->subsJson = json_encode($subs);
        $findUser->subs = $tempCountSubs;
        $findUser->save();

        return redirect()->back();
    }
}
