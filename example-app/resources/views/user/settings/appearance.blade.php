@extends('layouts.settings')

@section('page.title', 'Настройки персонализации')

@section('settings.left')
<x-settings.header />

<h2>Персонализация</h2>
<x-form.error />
<form action="" method="post">
    @csrf
    <div>
        <label for="username" class="form-label">Фотография</label>
        <input type="text" name="username" class="form-control" id="username" placeholder="К примеру, superman" onInput="data()" value="user10">
        <p>Может содержать только латинские буквы в нижнем регистре.</p>
    </div>
    <div>
        <label for="first_name" class="form-label">Имя</label>
        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Даниил" onInput="data()">
    </div>
    <div>
        <label for="last_name" class="form-label">Фамилия</label>
        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Иванов" onInput="data()">
    </div>

    <button class="btn btn-success" type="submit">{{ __('Сохранить') }}</button>
</form>

<form class="needs-validation person-settings-form-image w-100" action="/api/php/person/edit/edit-icon.php" method="post" novalidate>
    <div class="row row-cols-2 row-cols-lg-4 g-2">
        <div class="col">
            <input class="form-check-input visually-hidden" type="radio" name="icon" id="icon1" value="1" <?php echo $formicon[1] ?>>
            <label class="list-group-item" for="icon1">
                <img src="/app/img/users/icons/<?php echo $formmale ?>1.png" id="imgicon1">
            </label>
        </div>
        <div class="col">
            <input class="form-check-input visually-hidden" type="radio" name="icon" id="icon2" value="2" <?php echo $formicon[2] ?>>
            <label class="list-group-item" for="icon2">
                <img src="/app/img/users/icons/<?php echo $formmale ?>2.png" id="imgicon2">
            </label>
        </div>
        <div class="col">
            <input class="form-check-input visually-hidden" type="radio" name="icon" id="icon3" value="3" <?php echo $formicon[3] ?>>
            <label class="list-group-item" for="icon3">
                <img src="/app/img/users/icons/<?php echo $formmale ?>3.png" id="imgicon3">
            </label>
        </div>
        <div class="col">
            <input class="form-check-input visually-hidden" type="radio" name="icon" id="icon4" value="4" <?php echo $formicon[4] ?>>
            <label class="list-group-item" for="icon4">
                <img src="/app/img/users/icons/<?php echo $formmale ?>4.png" id="imgicon4">
            </label>
        </div>
        <div class="col">
            <input class="form-check-input visually-hidden" type="radio" name="icon" id="icon5" value="5" <?php echo $formicon[5] ?>>
            <label class="list-group-item" for="icon5">
                <img src="/app/img/users/icons/<?php echo $formmale ?>5.png" id="imgicon5">
            </label>
        </div>
        <div class="col">
            <input class="form-check-input visually-hidden" type="radio" name="icon" id="icon6" value="6" <?php echo $formicon[6] ?>>
            <label class="list-group-item" for="icon6">
                <img src="/app/img/users/icons/<?php echo $formmale ?>6.png" id="imgicon6">
            </label>
        </div>
        <div class="col">
            <input class="form-check-input visually-hidden" type="radio" name="icon" id="icon7" value="7" <?php echo $formicon[7] ?>>
            <label class="list-group-item" for="icon7">
                <img src="/app/img/users/icons/<?php echo $formmale ?>7.png" id="imgicon7">
            </label>
        </div>
        <input type="text" class="d-none" name="ismale" id="ismale" value="<?php echo $sex ?>">
    </div>
    <button class="btn btn-primary col-md-6 mt-2" type="submit">
        Сохранить изменения
    </button>
</form>

<form class="needs-validation person-settings-form-image form-image-bg w-100" action="/api/php/person/edit/edit-bg.php" method="post" novalidate>
    <div class="row row-cols-1 row-cols-lg-2 g-2">
        <div class="col">
            <input class="form-check-input visually-hidden" type="radio" name="bg" id="bg1" value="1" <?php echo $formbg[1] ?>>
            <label class="list-group-item" for="bg1">
                <img src="/app/img/users/bg/BG1.jpg">
            </label>
        </div>
        <div class="col">
            <input class="form-check-input visually-hidden" type="radio" name="bg" id="bg2" value="2" <?php echo $formbg[2] ?>>
            <label class="list-group-item" for="bg2">
                <img src="/app/img/users/bg/BG2.jpg">
            </label>
        </div>
        <div class="col">
            <input class="form-check-input visually-hidden" type="radio" name="bg" id="bg3" value="3" <?php echo $formbg[3] ?>>
            <label class="list-group-item" for="bg3">
                <img src="/app/img/users/bg/BG3.jpg">
            </label>
        </div>
        <div class="col">
            <input class="form-check-input visually-hidden" type="radio" name="bg" id="bg4" value="4" <?php echo $formbg[4] ?>>
            <label class="list-group-item" for="bg4">
                <img src="/app/img/users/bg/BG4.jpg">
            </label>
        </div>
        <div class="col">
            <input class="form-check-input visually-hidden" type="radio" name="bg" id="bg5" value="5" <?php echo $formbg[5] ?>>
            <label class="list-group-item" for="bg5">
                <img src="/app/img/users/bg/BG5.jpg">
            </label>
        </div>
        <div class="col">
            <input class="form-check-input visually-hidden" type="radio" name="bg" id="bg6" value="6" <?php echo $formbg[6] ?>>
            <label class="list-group-item" for="bg6">
                <img src="/app/img/users/bg/BG6.jpg">
            </label>
        </div>
        <div class="col">
            <input class="form-check-input visually-hidden" type="radio" name="bg" id="bg7" value="7" <?php echo $formbg[7] ?>>
            <label class="list-group-item" for="bg7">
                <img src="/app/img/users/bg/BG7.jpg">
            </label>
        </div>
    </div>
    <button class="btn btn-primary col-md-6 mt-2" type="submit">
        Сохранить изменения
    </button>
</form>

@endsection
