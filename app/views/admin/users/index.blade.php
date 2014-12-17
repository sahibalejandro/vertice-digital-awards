@extends('admin.partials.layout')

@section('content')

    {{-- Page Header --}}
    <div class="page-header">
        <h3>Users</h3>
    </div>
    {{-- // Page Header --}}

    <a class="btn btn-primary btn-sm" href="{{ route('admin.users.create') }}">Add User</a>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Photo</th>
            <th>Kill</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td><a href="{{ route('admin.users.edit', $user->id) }}">{{{ $user->name }}}</a></td>
                <td><img src="{{ $user->image('photo', 'micro') }}" alt="{{{ $user->name }}}"/></td>
                <td>
                    @include('admin.partials.killform', ['type' => 'users', 'id' => $user->id])
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $users->links() }}

@stop
