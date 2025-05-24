@extends('auth.layout.admin')
@section('title', 'Categories')
@section('content')
<div id = "buttonAdd">
    <a id="create" class="button-link" href="{{ route('admin.categories.create') }}">Add New Category</a>
</div>
<div class="container">
    <h2>Categories</h2>
    <table class="category-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>
                        <img src="{{ asset("/storage/category_images/$category->category_image") }}" alt="{{ $category->category_name }}" class="category-image">
                    </td>
                    <td>{{ $category->category_name }}</td>
                    <td>
                        <div class="button-container">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="button-link">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="navbar-logout">
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
