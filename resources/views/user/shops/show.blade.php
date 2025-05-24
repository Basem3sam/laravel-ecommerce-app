@extends('auth.layout.user')
@section('title', 'Buy ' . $product->product_name)

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Product Image -->
        <div class="col-md-6 mb-4">
            <img src="{{ asset('/storage/product_images/' . $product->product_image) }}" alt="{{ $product->product_name }}" class="img-fluid product-image rounded">
        </div>
        <!-- Product Details -->
        <div class="col-md-6">
            <h1 class="mb-3">{{ $product->product_name }}</h1>
            <p class="description mb-3">{{ $product->description }}</p>
            <p class="price mb-4">Price: ${{ $product->price }}</p>

            @if ($product->category)
                <div class="category-info mb-4">
                    <h5>Category: {{ $product->category->category_name }}</h5>
                    <img src="{{ asset('/storage/category_images/' . $product->category->category_image) }}" alt="{{ $product->category->category_name }}" class="img-fluid category-image rounded">
                </div>
            @endif

            <div class="d-flex justify-content-between">
                <a href="https://www.amazon.eg/" class="btn btn-primary btn-lg">Buy Product</a>
                <a href="{{ route('shops.index') }}" class="btn btn-secondary btn-lg">Back to Products</a>
            </div>
        </div>
    </div>
</div>
@endsection
