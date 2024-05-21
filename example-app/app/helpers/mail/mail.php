<?php

if (!function_exists('send_mail')) {
    function send_mail(string $email, string $subject, string $message): bool
    {
        $subject .= ' | Аквариум';
        $headers = 'Content-type: text/html';

        mail($email, $subject, $message, $headers);

        return true;
    }
}

// Text

require "text/login.php";
require "text/verify.php";
require "text/delete.php";
require "text/register.php";
require "text/new-password.php";
require "text/change-email.php";
require "text/login-by-code.php";
require "text/restore-password.php";
require "text/after-new-password.php";
