@extends('layout.main')

@section('title', 'main')

@section('content')

    {{--  counter application   --}}
    <h2 class="main__title">Количество выполненных заявок: {{ \App\Models\Applications::all()->where('status', 'Решено')->count()}}</h2>

    {{--  posts  --}}
    <div class="card">
        @foreach($applications as $application)
            <div class="card__item">
                <div class="card__img">
                    <img class="img img__new" src="{{ asset(\Illuminate\Support\Facades\Storage::url($application->photoPath)) }}" alt="">
                    <img class="img img__static" src="{{ asset(\Illuminate\Support\Facades\Storage::url($application->photoPath)) }}" alt="">
                </div>
                <div class="card__list">
                    <div class="list__item"><span>Название:</span></div>
                    <div class="list__item list__item_right"><h1>{{ $application->name }}</h1></div>
                </div>
                <div class="card__list">
                    <div class="list__item"><span>Категория:</span></div>
                    <div class="list__item list__item_right"><span>{{ $application->category }}</span></div>
                </div>
                <div class="card__list">
                    <div class="list__item"><span>Время:</span></div>
                    <div class="list__item list__item_right"><span>{{ $application->created_at }}</span></div>
                </div>
            </div>
        @endforeach
    </div>

    <hr>

    {{--  form login  --}}
    <div class="form">
        <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h2 class="form__title">Авторизация</h2>

            <div class="form__item">
                <p>Логин</p>
                <input class="form__input" type="text" name="login_auth" value="{{ old('login_auth') }}">
                @error ('login_auth') <div class="error">{{ $message }}</div> @enderror
            </div>


            <div class="form__item">
                <p>Пароль</p>
                <input class="form__input" type="password" name="password_auth">
                @error ('password_auth') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form__item">
                <button class="form__button">Войти</button>
            </div>
            @error ('auth') <div class="error">{{ $message }}</div> @enderror
        </form>
    </div>

    <hr>

    {{--  form registration  --}}
    <div class="form">
        <form action="{{ route('reg') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h2 class="form__title">Регистрация</h2>

            <div class="form__item">
                <p>ФИО</p>
                <input class="form__input" type="text" name="name" value="{{ old('name') }}" pattern="^[А-я ]*$">
                @error ('name') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form__item">
                <p>Логин</p>
                <input class="form__input" type="text" name="login" value="{{ old('login') }}">
                @error ('login') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form__item">
                <p>Почта</p>
                <input class="form__input" type="email" name="email" value="{{ old('email') }}">
                @error ('email') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form__item">
                <p>Пароль</p>
                <input class="form__input" type="password" name="password">
                @error ('password') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form__item">
                <p>Подтверждение пароля</p>
                <input class="form__input" type="password" name="password_confirmation">
                @error ('password_confirmation') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form__item">
                <input type="checkbox" name="agree">
                <span>Согласие на обработку персональных данных</span>
                @error ('agree') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form__item">
                <button class="form__button">Зарегистрироваться</button>
            </div>
        </form>
    </div>
@endsection
