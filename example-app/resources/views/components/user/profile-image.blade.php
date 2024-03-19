@if($avatarDefault)
<img src="{{ asset(user_image_exist("/img/user/logo/$avatar.png")) }}">
@else
<img src="{{ asset(user_image_exist("/$avatar.png")) }}">
@endif
