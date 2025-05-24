@extends('auth.layout.user')
@section('title', 'Products')
@section('content')

<div class="container mt-4">
    <!-- Search Form -->
    <form method="GET" action="{{ route('search') }}" class="mb-4">
        <div class="search-container d-flex">
            <input type="text" name="search" class="form-control search-bar" placeholder="Search products by name">
            <input type="submit" value="Search" class="btn search-button">
        </div>
    </form>

    <!-- Product Grid -->
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('/storage/product_images/' . $product->product_image) }}" alt="{{ $product->product_name }}" class="card-img-top product-image">
                <div class="card-body">
                    <h3 class="card-title">{{ $product->product_name }}</h3>
                    <p class="card-text">{{ Str::limit($product->description, 40) }}</p>
                    <p class="price">Price: ${{ $product->price }}</p>

                    @if ($product->category)
                        <div class="category-info">
                            <h5>Category: {{ $product->category->category_name }}</h5>
                            <img src="{{ asset('/storage/category_images/' . $product->category->category_image) }}" alt="{{ $product->category->category_name }}" class="category-image">
                        </div>
                    @endif
                </div>
                <a href="{{ route('shops.show', $product->id) }}" class="stretched-link"></a>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
</div>

@endsection
