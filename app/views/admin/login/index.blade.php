@extends('admin.partials.layout')

@section('content')

    {{-- Page Header --}}
    <div class="page-header">
        <h3>Vértice Digital Awards Backstage</h3>
    </div>
    {{-- // Page Header --}}

    {{-- Login Form --}}
    {{ Form::open(['route' => 'admin.login.store', 'class' => 'form-horizontal']) }}

        {{-- User Field --}}
        <div class="form-group">
            {{ Form::label('username', 'User:', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-3">
                {{ Form::text('username', null, ['class' => 'form-control', 'maxlength' => 20, 'autofocus']) }}
            </div>
        </div>
        {{-- /User Field --}}

        {{-- Password Field --}}
        <div class="form-group">
            {{ Form::label('password', 'Password:', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-3">
                {{ Form::password('password', ['class' => 'form-control', 'maxlength' => 20]) }}
            </div>
        </div>
        {{-- /Password Field --}}

        {{-- Submit button --}}
        <div class="row">
            <div class="col-sm-3 col-sm-offset-2">
                {{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
            </div>
        </div>
        {{-- /Submit button --}}

    {{ Form::close() }}
    {{-- /Login Form --}}

@stop
