@extends('layout.main')

@section('title', 'admin')

@section('content')

    {{--  counter application   --}}
    <h2 class="main__title">Всего заявок: {{ \App\Models\Applications::all()->count() }}</h2>

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
                    <div class="list__item"><span>Статус:</span></div>
                    <div class="list__item list__item_right"><span>{{ $application->status }}</span></div>
                </div>
                <div class="card__list">
                    <div class="list__item"><span>Категория:</span></div>
                    <div class="list__item list__item_right"><span>{{ $application->category }}</span></div>
                </div>
                <div class="card__list">
                    <div class="list__item"><span>Время:</span></div>
                    <div class="list__item list__item_right"><span>{{ $application->created_at }}</span></div>
                </div>
                <a class="delete" href="{{ route('application.delete', $application) }}">Удалить</a>

                @if ($application->status == "Новая")
                    @if (\Illuminate\Support\Facades\Auth::user()->is_admin)
                        <a class="updated" href="{{ route('next', $application) }}">Решена</a>
                        <a class="destroy" href="{{ route('prev', $application) }}">Отклонена</a>
                    @endif
                @endif
            </div>
        @endforeach
    </div>

    <hr>

@endsection
