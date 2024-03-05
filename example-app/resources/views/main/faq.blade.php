@extends('layouts.main')

@section('page.title', 'Ответы на вопросы')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/faq/index.css') }}" />
@endpush

@section('main.content')
    <div class="row gx-3">
        <div class="col-3 p-3">
            <ul id="left-bar-anchors"></ul>
        </div>
        <div class="col-7 p-3">
            <h1>
                Ответы на вопросы
            </h1>
            <p>
                Как начинался проект Аквариум? Что имеем на текущий счет? Чего ждать в будущем? Ответим на эти
                и на другие вопросы.
            </p>
            <h2>Lorem, ipsum dolor.1</h2>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, corporis!
            </p>
            <h3>Lorem, ipsum dolor.2</h3>
            <p>
                Lorem ipsum dolor sit.
            </p>
            <h3>Lorem, ipsum dolor.3</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, quas?
            </p>
            <h3>Lorem, ipsum dolor.4</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Id odit iste enim facilis libero ullam ratione, esse magnam. Quia, vitae!
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, voluptatem!
            </p>
            <h4>123123</h4>
            <h2>9999</h2>
            <h2>9999</h2>
            <h2>9999</h2>
            <h2>9999</h2>
        </div>
    </div>
@endsection

@once
    @push('js')
        <script src="{{ asset('js/page/left-bar-anchors.js') }}"></script>
    @endpush
@endonce
