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
                            <a href="{{ route('post.show', [$post->idUser, $post->idPost]) }}">
                                {{ route('post.show', [$post->idUser, $post->idPost]) }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.post.set-status.1', $post->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-check">
                                    <path d="M20 6 9 17l-5-5" />
                                </svg>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.post.set-status.-1', $post->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" stroke="currentColor" width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-x">
                                    <path d="M18 6 6 18" />
                                    <path d="m6 6 12 12" />
                                </svg>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.post.set-status.0', $post->id) }}">
                                0
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
