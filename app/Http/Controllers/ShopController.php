<?php

namespace App\Http\Controllers;

use id;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $products = Product::paginate(3);
        return view('user.shops.index', compact('products'));
    }

    public function viewCategories() {
        $categories = Category::All();
        return view('user.categories.index', compact('categories'));
    }

    public function viewProductsByCategory(string $id) {
        $products = Category::find($id)->products()->paginate(5);
        return view('user.shops.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('user.shops.show', compact('product'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
