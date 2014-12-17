@extends('admin.partials.layout')

@section('content')
    {{ Form::model($_resource, [
        'url'          => $_url,
        'method'       => $_method,
        'files'        => $_files,
        'class'        => 'form-horizontal',
        'autocomplete' => 'off',
    ]) }}
    @include($_view)
    {{ Form::close() }}
@stop
