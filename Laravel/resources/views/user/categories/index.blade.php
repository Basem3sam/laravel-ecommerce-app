@extends('user.home')
@section('title', 'Categories')

@section('content')
<div class="container">
    <h3 class="main-header" style="text-align: center;">Choose a Category for Product Searching</h3>
    <div class="row">
        @foreach($categories as $category)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <a href="{{ route('categories.products', $category->id) }}" class="stretched-link text-decoration-none">
                    <img src="{{ asset("/storage/category_images/{$category->category_image}") }}" alt="{{ $category->category_name }}" class="card-img-top">
                    <div class="card-body">
                        <h3 class="card-title">{{ $category->category_name }}</h3>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
