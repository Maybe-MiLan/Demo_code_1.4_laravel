<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
{{-- header --}}
    <header class="header">
        <div class="header__inner">
{{--       logo         --}}
            <div class="header__logo">
                <a href="{{ route('indexView') }}">
                    <img src="{{ asset('logo/logo.png') }}" alt="logo">
                </a>
            </div>
{{--        nav       --}}
            <div class="header__nav">
                <ul class="nav">
                    <li class="nav__item">
                        <a class="nav__link" href="{{ route('indexView') }}">Главная</a>
                    </li>
                    @auth()
                        <li class="nav__item">
                            <a class="nav__link" href="{{ route('application.my') }}">Мои заявки</a>
                        </li>
                        <li class="nav__item">
                            <a class="nav__link" href="{{ route('application.create') }}">Создание заявки</a>
                        </li>
                        <li class="nav__item">
                            <a class="nav__link" href="{{ route('adminapp') }}">Все заявки</a>
                        </li>
                        <li class="nav__item">
                            <a class="nav__link" href="{{ route('logout') }}">Выход</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </header>

{{--  content  --}}
    <div class="main">
        @yield('content')
    </div>
</body>
</html>
