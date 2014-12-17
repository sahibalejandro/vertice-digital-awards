@extends('admin.partials.layout')

@section('content')
    {{ Form::model($_resource, [
        'url'    => $_url,
        'method' => $_method,
        'files'  => $_files,
        'class'  => 'form-horizontal',
    ]) }}
    @include($_view)
    {{ Form::close() }}
@stop
