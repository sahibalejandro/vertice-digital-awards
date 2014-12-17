@extends('admin.partials.layout')

@section('content')

    <ul>
        <li><a href="{{ route('admin.categories.index') }}">Categories</a></li>
        <li><a href="{{ route('admin.participants.index') }}">Participants</a></li>
        <li><a href="{{ route('admin.login.destroy') }}">Logout</a></li>
    </ul>

@stop
