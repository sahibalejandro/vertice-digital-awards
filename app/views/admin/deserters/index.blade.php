@extends('admin.partials.layout')

@section('content')

    {{-- Page Header --}}
    <div class="page-header">
        <h3>Deserters</h3>
    </div>
    {{-- // Page Header --}}

    {{-- Notify Form --}}
    {{ Form::open(['class' => 'form-horizontal']) }}
        {{-- Submit button --}}
        <div class="row">
            <div class="col-sm-3 col-sm-offset-2">
                {{ Form::submit('Notify Deserters', ['class' => 'btn btn-primary']) }}
            </div>
        </div>
        {{-- /Submit button --}}
    {{ Form::close() }}
    {{-- /Notify Form --}}

    <h4>Deserters:</h4>

    <ul>
        @foreach ($deserters as $deserter)
        <li>{{{ $deserter->name }}} ({{ $deserter->username }}@verticecom.com)</li>
        @endforeach
    </ul>


@stop
