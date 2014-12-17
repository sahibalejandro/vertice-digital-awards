@extends('partials.layout')

@section('header')
{{-- Page Header --}}
<div class="category-header" style="background-image: url('{{ $category->image('image') }}')">
    <div class="container">
        <div class="category-name">
            <h3>La persona más</h3>
            <h1>{{{ $category->name }}}</h1>
        </div>
    </div>
</div>
{{-- // Page Header --}}
@stop

@section('content')


<div class="alert alert-info">
    Vota por la persona más <strong>{{{ strtolower($category->name) }}}</strong>, <em>tu voto es anónimo</em>.
</div>

@foreach ($participants as $participant)
    <a class="participant" href="#"
       data-participant-uuid="{{ $participant->uuid }}"
       data-participant-photo="{{ $participant->image('photo') }}"
       data-participant-name="{{{ $participant->name }}}">

        <img class="participant-photo img-circle" src="{{ $participant->image('photo') }}" alt="{{{ $participant->name }}}"/>
        <div class="participant-name">{{{ $participant->name }}}</div>

    </a><!-- a.participant -->
@endforeach

<div id="modal-confirm-vote" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirma tu voto</h4>
            </div><!-- div.modal-header -->

            <div class="modal-body">

                <p class="text-center">
                    <img id="modal-confirm-vote-photo" class="img-circle" src="about:blank" alt=""/>
                </p>

                <p>
                    Confirma tu voto para
                    <strong id="modal-confirm-vote-name"></strong>
                    en la categoría
                    <strong>{{{ $category->name }}}</strong>
                </p>
            </div><!-- div.modal-body -->

            <div class="modal-footer">
                {{-- Vote Form --}}
                {{ Form::open(['route' => 'home.vote', 'class' => 'form-horizontal']) }}
                {{ Form::hidden('category_uuid', $category->uuid) }}
                {{ Form::hidden('participant_uuid', null, ['id' => 'participant_uuid']) }}
                <button class="btn btn-default" type="button" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-success" type="submit">Votar</button>
                {{ Form::close() }}
                {{-- /Vote Form --}}
            </div><!-- div.modal-footer -->

        </div><!-- div.modal-content -->
    </div><!-- div.modal-dialog -->
</div><!-- div.modal fade -->

@stop
