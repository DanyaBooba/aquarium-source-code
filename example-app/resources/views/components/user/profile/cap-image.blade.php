@props([
    'capDefault' => false,
    'cap' => '',
])

@if ($capDefault)
    <img src="{{ asset("/img/user/bg/$cap.jpg") }}" class="user-profile-cap">
@else
    <img src="{{ $cap }}" class="user-profile-cap">
@endif
