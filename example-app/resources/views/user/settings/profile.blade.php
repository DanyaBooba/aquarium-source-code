@extends('layouts.settings')

@section('page.title', 'Настройки')

@section('settings.left')
<x-settings.header />

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exitModal">
  Launch demo modal
</button>

<div class="modal fade" id="exitModal" tabindex="-1" aria-labelledby="exitModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exitModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<h2>Профиль</h2>
<form action="" method="post">
    @csrf
    <div>
        <label for="username" class="form-label">Имя пользователя</label>
        <input type="text" class="form-control" id="username" placeholder="К примеру, daniil_dybka" onInput="settingsSetChangeFormTrue()">
        <p>Может содержать только латинские буквы в нижнем регистре.</p>
    </div>

    <div>
        <label for="username" class="form-label">Фамилия</label>
        <input type="text" class="form-control" id="username" placeholder="Имя пользователя" onInput="settingsSetChangeFormTrue()">
    </div>

    <div>
        <label for="username" class="form-label">Email address</label>
        <input type="text" class="form-control" id="username" placeholder="Имя пользователя" onInput="settingsSetChangeFormTrue()">
    </div>

    <button class="btn btn-success" type="submit">{{ __('Сохранить') }}</button>
</form>
@endsection
