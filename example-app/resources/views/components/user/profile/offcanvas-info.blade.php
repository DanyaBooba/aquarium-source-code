@props([
    'profile' => (object) [],
])

<div class="offcanvas offcanvas-bottom" tabindex="-1" id="canvasInfo" aria-labelledby="canvasInfoLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="canvasInfoLabel">
            {{ __('Информация') }}
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="user-offcanvas">
            <div class="user-profile-image">
                <x-user.profile.image :avatar="$profile->avatar" :avatar-default="$profile->avatarDefault" />
            </div>
        </div>
    </div>
</div>
