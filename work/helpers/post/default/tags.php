<?php

if (!function_exists('post_free_tags')) {
    function post_free_tags(): string
    {
        return '<h1><h2><h3><h4><h5><h6><br><p><a><ul><li><b><i><del><em><strong>';
    }
}
