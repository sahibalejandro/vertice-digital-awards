@extends('admin.partials.layout')

@section('content')

    {{-- Page Header --}}
    <div class="page-header">
        <h3>Participants</h3>
    </div>
    {{-- // Page Header --}}

    <a class="btn btn-primary btn-sm" href="{{ route('admin.participants.create') }}">Add Participant</a>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Photo</th>
            <th>Kill</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($participants as $participant)
            <tr>
                <td><a href="{{ route('admin.participants.edit', $participant->id) }}">{{{ $participant->name }}}</a></td>
                <td><img src="{{ $participant->image('photo', 'micro') }}" alt="{{{ $participant->name }}}"/></td>
                <td>
                    @include('admin.partials.killform', ['type' => 'participants', 'id' => $participant->id])
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $participants->links() }}

@stop
