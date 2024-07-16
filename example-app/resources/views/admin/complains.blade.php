@extends('layouts.admin.admin')

@section('admin.content')
    <h1>
        Админка
    </h1>

    <p>
        Жалобы на пользователей
    </p>

    @if (count($complains) == 0)
        <p>
            Нет пользователей
        </p>
    @else
        <table class="table table-hover"
            style="overflow: auto; position: relative; display: inline-block; vertical-align: top; max-width: 100%; overflow-x: auto; white-space: nowrap; -webkit-overflow-scrolling: touch;">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">idUser</th>
                    <th scope="col">link</th>
                    <th scope="col">idUserFrom</th>
                    <th scope="col">link</th>
                </tr>
            </thead>
            <tbody style="font-size: 12px">
                @foreach ($complains as $comp)
                    <tr>
                        <th scope="row">
                            <span class="text-muted">{{ $loop->iteration }}</span>
                        </th>
                        <td>
                            {{ $comp->idUser }}
                        </td>
                        <td>
                            <a href="{{ route('user.show.id', $comp->idUser) }}">
                                {{ route('user.show.id', $comp->idUser) }}
                            </a>
                        </td>
                        <td>
                            {{ $comp->idUserFrom }}
                        </td>
                        <td>
                            <a href="{{ route('user.show.id', $comp->idUserFrom) }}">
                                {{ route('user.show.id', $comp->idUserFrom) }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
