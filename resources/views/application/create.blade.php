@extends('layout.main')

@section('title', 'application create')

@section('content')

    <hr>

    {{--  form application create  --}}
    <div class="form">
        <form action="{{ route('application.create.post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h2 class="form__title">Создание заявки</h2>

            <div class="form__item">
                <p>Название</p>
                <input class="form__input" type="text" name="name" value="{{ old('name') }}">
                @error ('name') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form__item">
                <p>Описание</p>
                <input class="form__input" type="text" name="desc" value="{{ old('desc') }}">
                @error ('desc') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form__item">
                <p>Категория</p>
                <select name="category" class="form__input">
                @foreach($categories as $category)
                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
                </select>
                @error ('category') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form__item">
                <p>Фото</p>
                <input class="form__input" type="file" name="photoPath">
                @error ('photoPath') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form__item">
                <button class="form__button">Создать</button>
            </div>
        </form>
    </div>

    <hr>
@endsection
