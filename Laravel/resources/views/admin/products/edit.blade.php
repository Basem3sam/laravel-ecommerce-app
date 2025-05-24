@extends('auth.layout.admin')
@section('title', 'Edit Products')
@section('content')
<div class="container">
    <h2>Edit Product</h2>
    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" class="form-container">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="product_name">Enter Product Name:</label>
            <input type="text" name="product_name" id="product_name" value="{{ $product->product_name }}" placeholder="Product Name" class="form-input">
            @error('product_name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" cols="30" rows="5" class="form-textarea">{{ $product->description }}</textarea>
            @error('description')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="product_price">Product Price:</label>
            <input type="text" name="product_price" id="product_price" value="{{ $product->price }}" placeholder="Price" class="form-input">
            @error('product_price')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="product_image">Product Image:</label>
            <input type="file" name="product_image" id="product_image" accept="*/*" class="form-input">
            @if($product->product_image)
                <div class="current-image">
                    <img src="{{ asset("/storage/product_images/$product->product_image") }}" alt="{{ $product->product_name }}" class="img-thumbnail" width="150">
                    <p>Current Image</p>
                </div>
            @endif
            @error('product_image')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="category_id">Select Category:</label>
            <select name="category_id" id="category_id" class="form-select">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group buttons">
            <input type="submit" value="Update" class="button-link">
            <a class="button-link" href="{{ route('products.index') }}">Back to Products</a>
        </div>
    </form>
</div>
@endsection
