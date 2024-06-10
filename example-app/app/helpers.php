<?php

use App\Models\User\User;
use App\Models\User\Verify;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

// php artisan queue:work
// Queue::push('SendEmail', array('message' => $message));

// $date = Carbon::now()->addMinutes(10);
// Queue::later($date, 'SendEmail@send', array('message' => $message));

// User

require_once "helpers/user/get-user.php";
require_once "helpers/user/auth.php";
require_once "helpers/user/verify.php";
require_once "helpers/user/image.php";
require_once "helpers/user/random-data.php";

// Another

require_once "helpers/links.php";
require_once "helpers/form-word.php";
require_once "helpers/math.php";
require_once "helpers/randoms.php";

// Info

require_once "helpers/user/info/profile.php";
require_once "helpers/user/info/settings.php";

// Mail

require_once "helpers/mail/mail-info.php";
require_once "helpers/mail/mail.php";
