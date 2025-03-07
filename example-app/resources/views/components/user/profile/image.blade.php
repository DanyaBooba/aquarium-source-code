@props([
    'avatarDefault' => false,
    'avatar' => '',
])

@if ($avatarDefault)
    <img src="{{ asset("/img/user/logo/$avatar.png") }}" id="userProfileImage">
@else
    <img src="{{ $avatar }}" class="user-profile-image-service" id="userProfileImage">
@endif
