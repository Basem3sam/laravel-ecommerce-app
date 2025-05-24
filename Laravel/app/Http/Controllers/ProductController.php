<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(3);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request -> validate([
            'product_name' => 'required|min:5|max:60',
            'description' => 'required|min:20',
            'product_price' => 'required|numeric',
            'product_image' => 'sometimes|mimes:jpg, jpeg, png, webp'
        ]);

        if ($request->hasFile('product_image')) {
            $image_extension = $request->product_image->extension();
            $image_name = time() . '.' . $image_extension;
            Storage::put("/public/product_images/$image_name", file_get_contents($request->product_image));
        } else {
            $image_name = 'Default_image.jpg';
        }

        Product::create([
            'product_name' => $request -> product_name,
            'description' => $request -> description,
            'price' => $request -> product_price,
            'product_image' => $image_name,
            'category_id' => $request -> category_id
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view("admin.products.edit", ['categories' => $categories, 'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request -> validate([
            'product_name' => 'required|min:5|max:60',
            'description' => 'required|min:20',
            'product_price' => 'required|numeric',
            'product_image' => 'sometimes|mimes:jpg, jpeg, png, webp'
        ]);

        $image_name = Product::find($id) -> product_image;

        if ($request->hasFile('product_image')) {
            $image_extension = $request->product_image->extension();
            $image_name = time() . '.' . $image_extension;

            $product = Product::find($id);

            if (Storage::exists("/public/product_images/$product->product_image") && $product->product_image !== 'default_image.jpg') {
                Storage::delete("/public/product_images/$product->product_image");
            }

            Storage::put("/public/product_images/$image_name", file_get_contents($request->product_image));
        }

        Product::whereId($id)->update([
            'product_name' => $request -> product_name,
            'description' => $request -> description,
            'price' => $request -> product_price,
            'product_image' => $image_name,
            'category_id' => $request -> category_id
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        Storage::delete("/public/product_images/$product->image");
        $product->delete();
        return redirect()->route('products.index');
    }
}
