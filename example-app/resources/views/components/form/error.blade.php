@if($errors->any())
    <div class="alert alert-danger alert-error">
        <ul>
            @foreach($errors->all() as $message)
                <li>
                    {{ $message }}
                </li>
            @endforeach
        </ul>
    </div>
@endif
