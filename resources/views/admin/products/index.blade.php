@extends('auth.layout.admin')
@section('title', 'Products')
@section('content')
<div id="buttonAdd">
    <a id="create" class="button-link" href="{{ route('products.create') }}">Add New Product</a>
</div>

<div class="container">
    <form method="GET" action="{{ route('search') }}" class="mb-4">
        <div class="search-container d-flex">
            <input type="text" name="search" class="search-bar" placeholder="Search products by name">
            <input type="submit" value="Search..." class="search-button">
        </div>
    </form>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset("/storage/product_images/$product->product_image") }}" alt="{{ $product->product_name }}" class="card-img-top">

                <div class="card-body">
                    <h3 class="card-title">{{ $product->product_name }}</h3>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="price">${{ $product->price }}</p>

                    @if ($product->category)
                        <div class="category-info">
                            <h5>Category: {{ $product->category->category_name }}</h5>
                            <img src="{{ asset("/storage/category_images/{$product->category->category_image}") }}" alt="{{ $product->category->category_name }}" class="category-image">
                        </div>
                    @endif

                    <div class="button-container">
                        <a href="{{ route('products.edit', $product->id) }}" class="button-link edit">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this item?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="navbar-logout">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $products->links() }}
</div>
@endsection
