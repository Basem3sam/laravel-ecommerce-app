@extends('auth.layout.admin')
@section('title', 'Create Products')
@section('content')
<div class="container">
    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="form-container">
        @csrf
        <div class="form-group">
            <label for="product_name">Enter Product Name:</label>
            <input type="text" name="product_name" id="product_name" placeholder="Product Name" class="form-input">
            @error('product_name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" cols="30" rows="5" class="form-textarea"></textarea>
            @error('description')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="product_price">Product Price:</label>
            <input type="text" name="product_price" id="product_price" placeholder="Price" class="form-input">
            @error('product_price')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="product_image">Product Image:</label>
            <input type="file" name="product_image" id="product_image" accept="*/*" class="form-input">
            @error('product_image')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="category_id">Select Category:</label>
            <select name="category_id" id="category_id" class="form-select">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
            <input type="submit" value="ADD" class="button-link">
            <a class="button-link" href="{{ route("admin.categories.index") }}">Get Back</a>
    </form>
</div>
@endsection
