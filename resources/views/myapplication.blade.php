@extends('layout.main')

@section('title', 'application create')

@section('content')

    {{--  my application posts  --}}
    <h2 class="main__title">Мои заявки</h2>

    <hr>

    {{--  posts  --}}
    <div class="card">
        @foreach($applications as $application)
            <div class="card__item">
                <div class="card__list">
                    <div class="list__item"><span>Название:</span></div>
                    <div class="list__item list__item_right"><h1>{{ $application->name }}</h1></div>
                </div>
                <div class="card__list">
                    <div class="list__item"><span>Категория:</span></div>
                    <div class="list__item list__item_right"><span>{{ $application->category }}</span></div>
                </div>
                <div class="card__list">
                    <div class="list__item"><span>Статус:</span></div>
                    <div class="list__item list__item_right"><span>{{ $application->status }}</span></div>
                </div>
                <div class="card__list">
                    <div class="list__item"><span>Описание:</span></div>
                    <div class="list__item list__item_right"><span>{{ $application->desc }}</span></div>
                </div>
                <div class="card__list">
                    <div class="list__item"><span>Время:</span></div>
                    <div class="list__item list__item_right"><span>{{ $application->created_at }}</span></div>
                </div>
                @if ($application->status == "Новая")
                    <a class="delete" href="{{ route('application.delete', $application) }}">Удалить</a>
                @endif
            </div>
        @endforeach
    </div>
@endsection
