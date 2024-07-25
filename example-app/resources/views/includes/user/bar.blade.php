@if (user_login())
    <div class="social">
        <div class="social-left">
            <div>
                <a href="{{ route('user.exit') }}" class="social-left-exit" title="{{ __('Выйти') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-log-out">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        <polyline points="16 17 21 12 16 7" />
                        <line x1="21" x2="9" y1="12" y2="12" />
                    </svg>
                </a>
            </div>
            <div>
                <a href="{{ route('main') }}" title="{{ __('На главную') }}">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15 22H19C19.5304 22 20.0391 21.7893 20.4142 21.4142C20.7893 21.0391 21 20.5304 21 20V9L12 2L3 9V20C3 20.5304 3.21071 21.0391 3.58579 21.4142C3.96086 21.7893 4.46957 22 5 22H9"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9 22V12H15V22" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="social-right">
            <div>
                <a href="{{ route('user.notifications') }}" class="{{ header_route_active_link('user.notifications') }}"
                    title="{{ __('Уведомления') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
                        <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
                    </svg>
                </a>
            </div>
            <div>
                <a href="{{ route('user.achievements') }}" class="{{ header_route_active_link('user.achievements') }}"
                    title="{{ __('Достижения') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-trophy">
                        <path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6" />
                        <path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18" />
                        <path d="M4 22h16" />
                        <path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22" />
                        <path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22" />
                        <path d="M18 2H6v7a6 6 0 0 0 12 0V2Z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
@endif

<a href="{{ user_login() ? route('user') : route('main') }}">
    <x-user.bar-logo />
</a>

<ul>
    @if (user_login())
        <li>
            <a href="{{ route('user') }}" class="{{ header_route_active_link('user') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                    <circle cx="12" cy="7" r="4" />
                </svg>
                {{ __('Профиль') }}
            </a>
        </li>
        <li>
            <a href="{{ route('post.add') }}" class="{{ header_route_active_link('post.add') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-plus-circle">
                    <circle cx="12" cy="12" r="10" />
                    <path d="M8 12h8" />
                    <path d="M12 8v8" />
                </svg>
                {{ __('Добавить запись') }}
            </a>
        </li>
        <li>
            <a href="{{ route('user.feed') }}" class="{{ header_route_active_link('user.feed') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2" />
                    <path d="M18 14h-8" />
                    <path d="M15 18h-5" />
                    <path d="M10 6h8v4h-8V6Z" />
                </svg>
                {{ __('Записи') }}
            </a>
        </li>
        <li>
            <a href="{{ route('user.search') }}" class="{{ header_route_active_link('user.search') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-search">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.3-4.3" />
                </svg>
                {{ __('Поиск') }}
            </a>
        </li>
        <li>
            <a href="{{ route('settings') }}" class="{{ header_route_active_link('settings') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path
                        d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z" />
                    <circle cx="12" cy="12" r="3" />
                </svg>
                {{ __('Настройки') }}
            </a>
        </li>
    @else
        <li>
            <a href="{{ route('auth.signin') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-log-in">
                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                    <polyline points="10 17 15 12 10 7" />
                    <line x1="15" x2="3" y1="12" y2="12" />
                </svg>
                {{ __('Войти') }}
            </a>
        </li>
        <li>
            <a href="{{ route('auth.signup') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-square-pen">
                    <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                    <path d="M18.375 2.625a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4Z" />
                </svg>
                {{ __('Создать аккаунт') }}
            </a>
        </li>
    @endif
</ul>

{{-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <title>Document</title>
    <style>
      #sidebar {
        border-right: 1px solid black;
        overflow-y: scroll;
        padding: 0;
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
      }
    </style>
  </head>
  <body>
    <div id="app">
      <div class="container-fluid">
        <div class="row">
          <div id="sidebar" class="col-md-2 bg-light">
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde
              omnis doloremque quis repellat quo eum itaque fuga magnam, non
              ratione eveniet dolor aliquam totam pariatur deleniti nisi nihil
              fugit error? Quibusdam maiores molestias quidem blanditiis cum
              odit velit quia ab temporibus nobis voluptatem, nihil ipsum
              explicabo tempora iusto. Doloremque consectetur tempora ipsum modi
              culpa atque, aliquid officia eaque blanditiis ea dicta voluptas
              deleniti provident nobis dolore voluptatem molestias recusandae
              expedita placeat adipisci! Minus, praesentium maiores. Corporis
              sed ad magni enim voluptates, nobis, temporibus quibusdam
              molestias cum quae consectetur nisi facere optio. Repudiandae,
              nisi accusantium? Tempora in mollitia voluptatum deserunt
              expedita.
            </p>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde
              omnis doloremque quis repellat quo eum itaque fuga magnam, non
              ratione eveniet dolor aliquam totam pariatur deleniti nisi nihil
              fugit error? Quibusdam maiores molestias quidem blanditiis cum
              odit velit quia ab temporibus nobis voluptatem, nihil ipsum
              explicabo tempora iusto. Doloremque consectetur tempora ipsum modi
              culpa atque, aliquid officia eaque blanditiis ea dicta voluptas
              deleniti provident nobis dolore voluptatem molestias recusandae
              expedita placeat adipisci! Minus, praesentium maiores. Corporis
              sed ad magni enim voluptates, nobis, temporibus quibusdam
              molestias cum quae consectetur nisi facere optio. Repudiandae,
              nisi accusantium? Tempora in mollitia voluptatum deserunt
              expedita.
            </p>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde
              omnis doloremque quis repellat quo eum itaque fuga magnam, non
              ratione eveniet dolor aliquam totam pariatur deleniti nisi nihil
              fugit error? Quibusdam maiores molestias quidem blanditiis cum
              odit velit quia ab temporibus nobis voluptatem, nihil ipsum
              explicabo tempora iusto. Doloremque consectetur tempora ipsum modi
              culpa atque, aliquid officia eaque blanditiis ea dicta voluptas
              deleniti provident nobis dolore voluptatem molestias recusandae
              expedita placeat adipisci! Minus, praesentium maiores. Corporis
              sed ad magni enim voluptates, nobis, temporibus quibusdam
              molestias cum quae consectetur nisi facere optio. Repudiandae,
              nisi accusantium? Tempora in mollitia voluptatum deserunt
              expedita.
            </p>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde
              omnis doloremque quis repellat quo eum itaque fuga magnam, non
              ratione eveniet dolor aliquam totam pariatur deleniti nisi nihil
              fugit error? Quibusdam maiores molestias quidem blanditiis cum
              odit velit quia ab temporibus nobis voluptatem, nihil ipsum
              explicabo tempora iusto. Doloremque consectetur tempora ipsum modi
              culpa atque, aliquid officia eaque blanditiis ea dicta voluptas
              deleniti provident nobis dolore voluptatem molestias recusandae
              expedita placeat adipisci! Minus, praesentium maiores. Corporis
              sed ad magni enim voluptates, nobis, temporibus quibusdam
              molestias cum quae consectetur nisi facere optio. Repudiandae,
              nisi accusantium? Tempora in mollitia voluptatum deserunt
              expedita.
            </p>
          </div>
          <div class="col-md-10 ms-auto" id="map">
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde
              omnis doloremque quis repellat quo eum itaque fuga magnam, non
              ratione eveniet dolor aliquam totam pariatur deleniti nisi nihil
              fugit error? Quibusdam maiores molestias quidem blanditiis cum
              odit velit quia ab temporibus nobis voluptatem, nihil ipsum
              explicabo tempora iusto. Doloremque consectetur tempora ipsum modi
              culpa atque, aliquid officia eaque blanditiis ea dicta voluptas
              deleniti provident nobis dolore voluptatem molestias recusandae
              expedita placeat adipisci! Minus, praesentium maiores. Corporis
              sed ad magni enim voluptates, nobis, temporibus quibusdam
              molestias cum quae consectetur nisi facere optio. Repudiandae,
              nisi accusantium? Tempora in mollitia voluptatum deserunt
              expedita.
            </p>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde
              omnis doloremque quis repellat quo eum itaque fuga magnam, non
              ratione eveniet dolor aliquam totam pariatur deleniti nisi nihil
              fugit error? Quibusdam maiores molestias quidem blanditiis cum
              odit velit quia ab temporibus nobis voluptatem, nihil ipsum
              explicabo tempora iusto. Doloremque consectetur tempora ipsum modi
              culpa atque, aliquid officia eaque blanditiis ea dicta voluptas
              deleniti provident nobis dolore voluptatem molestias recusandae
              expedita placeat adipisci! Minus, praesentium maiores. Corporis
              sed ad magni enim voluptates, nobis, temporibus quibusdam
              molestias cum quae consectetur nisi facere optio. Repudiandae,
              nisi accusantium? Tempora in mollitia voluptatum deserunt
              expedita.
            </p>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde
              omnis doloremque quis repellat quo eum itaque fuga magnam, non
              ratione eveniet dolor aliquam totam pariatur deleniti nisi nihil
              fugit error? Quibusdam maiores molestias quidem blanditiis cum
              odit velit quia ab temporibus nobis voluptatem, nihil ipsum
              explicabo tempora iusto. Doloremque consectetur tempora ipsum modi
              culpa atque, aliquid officia eaque blanditiis ea dicta voluptas
              deleniti provident nobis dolore voluptatem molestias recusandae
              expedita placeat adipisci! Minus, praesentium maiores. Corporis
              sed ad magni enim voluptates, nobis, temporibus quibusdam
              molestias cum quae consectetur nisi facere optio. Repudiandae,
              nisi accusantium? Tempora in mollitia voluptatum deserunt
              expedita.
            </p>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde
              omnis doloremque quis repellat quo eum itaque fuga magnam, non
              ratione eveniet dolor aliquam totam pariatur deleniti nisi nihil
              fugit error? Quibusdam maiores molestias quidem blanditiis cum
              odit velit quia ab temporibus nobis voluptatem, nihil ipsum
              explicabo tempora iusto. Doloremque consectetur tempora ipsum modi
              culpa atque, aliquid officia eaque blanditiis ea dicta voluptas
              deleniti provident nobis dolore voluptatem molestias recusandae
              expedita placeat adipisci! Minus, praesentium maiores. Corporis
              sed ad magni enim voluptates, nobis, temporibus quibusdam
              molestias cum quae consectetur nisi facere optio. Repudiandae,
              nisi accusantium? Tempora in mollitia voluptatum deserunt
              expedita.
            </p>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde
              omnis doloremque quis repellat quo eum itaque fuga magnam, non
              ratione eveniet dolor aliquam totam pariatur deleniti nisi nihil
              fugit error? Quibusdam maiores molestias quidem blanditiis cum
              odit velit quia ab temporibus nobis voluptatem, nihil ipsum
              explicabo tempora iusto. Doloremque consectetur tempora ipsum modi
              culpa atque, aliquid officia eaque blanditiis ea dicta voluptas
              deleniti provident nobis dolore voluptatem molestias recusandae
              expedita placeat adipisci! Minus, praesentium maiores. Corporis
              sed ad magni enim voluptates, nobis, temporibus quibusdam
              molestias cum quae consectetur nisi facere optio. Repudiandae,
              nisi accusantium? Tempora in mollitia voluptatum deserunt
              expedita.
            </p>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde
              omnis doloremque quis repellat quo eum itaque fuga magnam, non
              ratione eveniet dolor aliquam totam pariatur deleniti nisi nihil
              fugit error? Quibusdam maiores molestias quidem blanditiis cum
              odit velit quia ab temporibus nobis voluptatem, nihil ipsum
              explicabo tempora iusto. Doloremque consectetur tempora ipsum modi
              culpa atque, aliquid officia eaque blanditiis ea dicta voluptas
              deleniti provident nobis dolore voluptatem molestias recusandae
              expedita placeat adipisci! Minus, praesentium maiores. Corporis
              sed ad magni enim voluptates, nobis, temporibus quibusdam
              molestias cum quae consectetur nisi facere optio. Repudiandae,
              nisi accusantium? Tempora in mollitia voluptatum deserunt
              expedita.
            </p>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde
              omnis doloremque quis repellat quo eum itaque fuga magnam, non
              ratione eveniet dolor aliquam totam pariatur deleniti nisi nihil
              fugit error? Quibusdam maiores molestias quidem blanditiis cum
              odit velit quia ab temporibus nobis voluptatem, nihil ipsum
              explicabo tempora iusto. Doloremque consectetur tempora ipsum modi
              culpa atque, aliquid officia eaque blanditiis ea dicta voluptas
              deleniti provident nobis dolore voluptatem molestias recusandae
              expedita placeat adipisci! Minus, praesentium maiores. Corporis
              sed ad magni enim voluptates, nobis, temporibus quibusdam
              molestias cum quae consectetur nisi facere optio. Repudiandae,
              nisi accusantium? Tempora in mollitia voluptatum deserunt
              expedita.
            </p>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde
              omnis doloremque quis repellat quo eum itaque fuga magnam, non
              ratione eveniet dolor aliquam totam pariatur deleniti nisi nihil
              fugit error? Quibusdam maiores molestias quidem blanditiis cum
              odit velit quia ab temporibus nobis voluptatem, nihil ipsum
              explicabo tempora iusto. Doloremque consectetur tempora ipsum modi
              culpa atque, aliquid officia eaque blanditiis ea dicta voluptas
              deleniti provident nobis dolore voluptatem molestias recusandae
              expedita placeat adipisci! Minus, praesentium maiores. Corporis
              sed ad magni enim voluptates, nobis, temporibus quibusdam
              molestias cum quae consectetur nisi facere optio. Repudiandae,
              nisi accusantium? Tempora in mollitia voluptatum deserunt
              expedita.
            </p>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde
              omnis doloremque quis repellat quo eum itaque fuga magnam, non
              ratione eveniet dolor aliquam totam pariatur deleniti nisi nihil
              fugit error? Quibusdam maiores molestias quidem blanditiis cum
              odit velit quia ab temporibus nobis voluptatem, nihil ipsum
              explicabo tempora iusto. Doloremque consectetur tempora ipsum modi
              culpa atque, aliquid officia eaque blanditiis ea dicta voluptas
              deleniti provident nobis dolore voluptatem molestias recusandae
              expedita placeat adipisci! Minus, praesentium maiores. Corporis
              sed ad magni enim voluptates, nobis, temporibus quibusdam
              molestias cum quae consectetur nisi facere optio. Repudiandae,
              nisi accusantium? Tempora in mollitia voluptatum deserunt
              expedita.
            </p>
          </div>
        </div>
      </div>
    </div>
  </body>
</html> --}}

{{-- <!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
      .toast {
        border: none !important;
      }

      .toast-body {
        font-size: 1rem;
        padding: 0.7rem 1rem;
      }
    </style>
  </head>
  <body>
    <button type="button" class="btn btn-primary" id="toastbtn">
      Show Toast
    </button>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
      <div
        class="toast show"
        role="alert"
        aria-live="assertive"
        aria-atomic="true"
      >
        <div class="toast-body">Сообщение было скопировано.</div>
      </div>
    </div>

    <script>
      //   document.getElementById("toastbtn").onclick = function () {
      //     var toastElList = [].slice.call(document.querySelectorAll(".toast"));
      //     var toastList = toastElList.map(function (toastEl) {
      //       return new bootstrap.Toast(toastEl);
      //     });
      //     toastList.forEach((toast) => toast.show());
      //   };
    </script>
  </body>
</html> --}}
