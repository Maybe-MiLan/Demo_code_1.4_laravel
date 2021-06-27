@extends('layout.main')

@section('title', 'application create')

@section('content')

    {{--  my application posts  --}}
    <h2 class="main__title">Административная панель</h2>

    <hr>

    {{--  form login  --}}
    <div class="form">
        <form action="{{ route('category.create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h2 class="form__title">Категори</h2>

            <div class="form__item">
                <p>Название</p>
                <input class="form__input" type="text" name="name" value="{{ old('name') }}">
                @error ('name') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form__item">
                <button class="form__button">Создать</button>
            </div>
        </form>
    </div>

    <hr>

    <div class="card">
        @foreach($categories as $category)
            <div class="card__item">
                <div class="card__list">
                    <div class="list__item"><span>Название:</span></div>
                    <div class="list__item list__item_right"><h1>{{ $category->name }}</h1></div>
                </div>
                <a class="delete" href="{{ route('category.delete', $category) }}">Удалить</a>
            </div>
        @endforeach
    </div>
@endsection
