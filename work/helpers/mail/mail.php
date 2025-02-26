<?php

if (!function_exists('send_mail')) {
    function send_mail(string $email, string $subject, string $message): bool
    {
        $subject .= ' | Аквариум';
        $headers = "From: no-reply@aquarium.org.ru\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        $sendSubject = mb_encode_mimeheader($subject, "UTF-8", "Q");

        mail($email, $sendSubject, $message, $headers);

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
