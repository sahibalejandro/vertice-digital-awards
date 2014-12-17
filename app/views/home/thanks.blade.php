@extends('partials.layout')

@section('content')

<div class="jumbotron">

    <h2>¡Haz votado en todas las categorías disponibles!</h2>

    <p>
        Gracias por tus prejuicios sobre las personas a las que llamas "amigos".
    </p>

</div><!-- div.jumbotron -->
    
@foreach ($participants as $participant)
<div class="participant">

    <img class="img-circle" src="{{ $participant->image('photo') }}" alt="{{{ $participant->name }}}"/>

    <div class="participant-votes">{{ $participant->votesToMe()->count() }}</div>
    
</div><!-- div.participant -->
@endforeach

@stop
