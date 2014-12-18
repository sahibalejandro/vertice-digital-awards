@extends('partials.layout')

@section('content')

    {{-- Page Header --}}
    <div class="page-header">
        <h1>Y los nominados son...</h1>
    </div>
    {{-- // Page Header --}}

    @foreach ($categories as $category)
    <div class="nominees-category">
        <h2>La persona más {{{ strtolower($category->name) }}}</h2>

        <div class="nominees clearfix">
            @foreach ($category->nominees() as $nominated)
                <div class="nominated">
                    <img class="participant-photo img-circle" src="{{ $nominated->user->image('photo') }}" alt="{{{ $nominated->user->name }}}"/>
                    <div class="participant-name">{{{ $nominated->user->name }}}</div>
                </div>
            @endforeach
        </div>

    </div>
    @endforeach

@stop
