@extends('admin.partials.layout')

@section('content')

    {{-- Page Header --}}
    <div class="page-header">
        <h3>Categories</h3>
    </div>
    {{-- // Page Header --}}

    <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.create') }}">Add Category</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td><a href="{{ route('admin.categories.edit', $category->id) }}">{{{ $category->name }}}</a></td>
                <td>
                    @include('admin.partials.killform', ['type' => 'categories', 'id' => $category->id])
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categories->links() }}

@stop
