<?php

if (!function_exists('get_user')) {
    function get_user($user, $local = false)
    {
        $profile = $user;

        $profile->name = profile_display_name($user->firstName, $user->lastName);
        $profile->subs = profile_info_isset_value($user->subs, 0);
        $profile->sub = profile_info_isset_value($user->sub, 0);
        $profile->achivs = profile_info_isset_value($user->achivs, 0);
        $profile->local = $local;
        $profile->status = $user->verified ? "active" : "needConfirm";

        return $profile;
    }
}

if (!function_exists('get_user_search')) {
    function get_user_search($user)
    {
        $profile = (object) [
            'id' => $user->id,
            'name' => profile_display_name($user->firstName, $user->lastName),
            'username' => $user->username,
            'desc' => $user->desc,
            'avatar' => $user->avatar,
            'avatarDefault' => $user->avatarDefault,
            'subs' => $user->subs,
            'sub' => $user->sub
        ];

        return $profile;
    }
}
