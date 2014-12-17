@extends('partials.layout')

@section('content')

    <div class="jumbotron">

        <h1>Vértice Digital Awards 2014</h1>

        <p>Juzgando a las personas&hellip; sin conocerlas.</p>

        <hr/>

        <p>Para participar identificate con tu email de vértice.</p>

        {{-- Login Form --}}
        {{ Form::open(['route' => 'login.store', 'class' => 'form-horizontal', 'autocomplete' => 'off']) }}
            {{-- Username Field --}}
            <div class="form-group">
                {{ Form::label('username', 'email:', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-4">
                    <div class="input-group">
                        {{ Form::text('username', null, ['class' => 'form-control', 'maxlength' => 100, 'autofocus']) }}
                        <div class="input-group-addon">@verticecom.com</div>
                    </div>
                </div>
            </div>
            {{-- /Username Field --}}

            {{-- Submit button --}}
            <div class="row">
                <div class="col-sm-3 col-sm-offset-2">
                    {{ Form::submit('Participar', ['class' => 'btn btn-success btn-lg']) }}
                </div>
            </div>
            {{-- /Submit button --}}

        {{ Form::close() }}
        {{-- /Login Form --}}

    </div><!-- div.jumbotron -->


@stop
