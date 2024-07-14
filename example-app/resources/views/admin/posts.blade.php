@extends('layouts.admin.admin')

@section('admin.content')
    <h1>
        Админка
    </h1>

    <p>
        Посты пользователей
    </p>

    @if (count($posts) == 0)
        <p>
            Нет пользователей
        </p>
    @else
        <table class="table table-hover"
            style="overflow: auto; position: relative; display: inline-block; vertical-align: top; max-width: 100%; overflow-x: auto; white-space: nowrap; -webkit-overflow-scrolling: touch;">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">idPost</th>
                    <th scope="col">active</th>
                    <th scope="col">status</th>
                    <th scope="col">idUser</th>
                    <th scope="col">user</th>
                    <th scope="col">have image</th>
                    <th scope="col">image name</th>
                    <th scope="col">link</th>
                </tr>
            </thead>
            <tbody style="font-size: 12px">
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">
                            <span class="text-muted">{{ $loop->iteration }}</span>
                            {{ $post->id }}
                        </th>
                        <td>
                            {{ $post->idPost }}
                        </td>
                        <td>{!! $post->active == 1 ? "<span class='text-success'>yes</span>" : "<span class='text-danger'>no</span>" !!}</td>
                        <td>{!! $post->active !!}</td>
                        <td>{!! $post->idUser !!}</td>
                        <td>
                            <a href="{{ route('user.show.id', $post->idUser) }}">
                                {{ route('user.show.id', $post->idUser) }}
                            </a>
                        </td>
                        <td>{!! $post->haveimage !!}</td>
                        <td>{!! $post->imagename !!}</td>
                        <td>
                            <a href="{{ route('user.post.show.id', [$post->idUser, $post->idPost]) }}">
                                {{ route('user.post.show.id', [$post->idUser, $post->idPost]) }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
