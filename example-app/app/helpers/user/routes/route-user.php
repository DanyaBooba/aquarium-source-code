<?php

if (!function_exists('route_user_show')) {
    function route_user_show($id, $nickname): string
    {
        if (!empty($nickname)) return route('user.show.nickname', $nickname);

        return route('user.show.id', $id);
    }
}
