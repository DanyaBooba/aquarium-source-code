<div class="profile-posts" style="margin-top: 1.5rem">
    <div class="d-flex flex-column" style="max-width: 600px">
        @for($i = 1; $i <= 2; $i++)
        <div class="profile-posts__post" style="margin-bottom: .5rem">
            <div style="width: 100%; height: 300px; background-image: url('{{ asset('img/posts/' . $i . '.jpg') }}'); background-size: cover; border-radius: 12px; background-position: center;">
            </div>
        </div>
        @endfor
    </div>
</div>
