@extends('layouts.admin.admin')

@section('admin.content')
    <style>
        .max-width-300 {
            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        svg.svg-unactive {
            stroke: #ccc;
        }

        svg.svg-unactive:hover {
            stroke: var(--text);
        }

        .link-block {
            color: #ccc !important;
        }

        .link-block:hover {
            color: var(--text) !important;
        }
    </style>

    <h1>
        Все пользователи
    </h1>

    <p>
        Количество пользователей: {{ count($users) }}
    </p>

    <p>
        Процент пользователей с подтвержденной почтой: {{ round(count($usersVerified) / count($users), 2) * 100 }}%
    </p>

    @if (count($users) == 0)
        <p>
            Нет пользователей
        </p>
    @else
        <table class="table table-hover"
            style="overflow: auto; position: relative; display: inline-block; vertical-align: top; max-width: 100%; overflow-x: auto; white-space: nowrap; -webkit-overflow-scrolling: touch;">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">verify</th>
                    <th scope="col">email</th>
                    <th scope="col">first name</th>
                    <th scope="col">last name</th>
                    <th scope="col">username</th>
                    <th scope="col">link</th>
                </tr>
            </thead>
            <tbody style="font-size: 12px">
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">
                            <span class="text-muted">{{ $loop->iteration }}</span>
                            {{ $user->id }}
                        </th>
                        <td>{!! $user->verified ? "<span class='text-success'>yes</span>" : "<span class='text-danger'>no</span>" !!}</td>
                        <td>{!! $user->email !!}</td>
                        <td class="max-width-300">{!! $user->firstName !!}</td>
                        <td class="max-width-300">{!! $user->lastName !!}</td>
                        <td>{!! $user->username !!}</td>
                        <td>
                            <a href="{{ route('user.show.id', $user->id) }}">
                                {{ route('user.show.id', $user->id) }}
                            </a>
                        </td>
                        <td>
                            <button type="button" class="btn p-0 m-0" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $loop->index }}"
                                style="display: flex; height: 18px; outline: none !important">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-square-arrow-out-up-right">
                                    <path d="M21 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6" />
                                    <path d="m21 3-9 9" />
                                    <path d="M15 3h6v6" />
                                </svg>
                            </button>
                        </td>
                        <td>
                            @if ($user->verified == false)
                                <a href="{{ route('admin.set-user-active', $user->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check">
                                        <path d="M20 6 9 17l-5-5" />
                                    </svg>
                                </a>
                            @else
                                <a href="{{ route('admin.set-user-unactive', $user->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="svg-unactive" width="18"
                                        height="18" viewBox="0 0 24 24" fill="none" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
                                        <path d="M18 6 6 18" />
                                        <path d="m6 6 12 12" />
                                    </svg>
                                </a>
                            @endif
                        </td>
                        <td>
                            @if ($user->blocked == false)
                                <a href="#" class="link-block">
                                    block
                                </a>
                            @else
                                <a href="#">
                                    unblock
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @foreach ($users as $user)
            <div class="modal fade" id="exampleModal{{ $loop->index }}" tabindex="-1"
                aria-labelledby="exampleModalLabel{{ $loop->index }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel{{ $loop->index }}">Profile user</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div>
                                ID: {{ $user->id }}
                            </div>
                            <div>
                                Email: {{ $user->email }}
                            </div>
                            <div>
                                Create: {{ $user->created_at }}
                            </div>
                            <div>
                                Update: {{ $user->updated_at }}
                            </div>
                            <hr>
                            <div>
                                User type:
                                {{ $user->usertype == 0 ? 'пользователь' : '' }}
                                {{ $user->usertype == 100 ? 'админ' : '' }}
                                {{ $user->usertype == -1 ? 'тестовый' : '' }}
                                <span class="text-muted">{{ $user->usertype }}</span>
                            </div>
                            <div>
                                MD5: {{ $user->md5use ? 'да' : 'нет' }}
                            </div>
                            <div>
                                Verified:
                                <span class="{{ $user->verified ? 'text-success' : 'text-danger' }}">
                                    {{ $user->verified ? 'yes' : 'no' }}
                                </span>
                            </div>
                            <div>
                                Blocked: {{ $user->blocked }}
                            </div>
                            <hr>
                            <div>
                                Username: {{ $user->username }}
                            </div>
                            <div>
                                First name: {{ $user->firstName }}
                            </div>
                            <div>
                                Last name: {{ $user->lastName }}
                            </div>
                            <hr>
                            <div>
                                Avatar: {{ $user->avatar }}
                            </div>
                            <div>
                                Cap: {{ $user->cap }}
                            </div>
                            <div>
                                Desc: "{{ $user->desc }}"
                            </div>
                            <hr>
                            <div>
                                Subs: {{ $user->subs }}
                                <span class="text-muted">
                                    {{ $user->subsJson }}
                                </span>
                            </div>
                            <div>
                                Sub: {{ $user->sub }}
                                <span class="text-muted">
                                    {{ $user->subJson }}
                                </span>
                            </div>
                            <div>
                                Achivs: {{ $user->achivs }}
                                <span class="text-muted">
                                    {{ $user->achivsJson }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection
