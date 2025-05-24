@extends('auth.layout.admin')
@section('title', 'Create Category')
@section('content')
<div class="container">
    <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data" class="form-container">
        @csrf
        <div class="form-group">
            <label for="category_name">Enter Category Name:</label>
            <input type="text" name="category_name" id="category_name" placeholder="Category Name" class="form-input">
            @error('category_name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="category_image">Category Image:</label>
            <input type="file" name="category_image" id="category_image" accept="*/*" class="form-input">
            @error('category_image')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <input type="submit" value="ADD">
        <a class="button-link" href="{{ route("admin.categories.index") }}">Get Back</a>
    </form>
</div>
@endsection
