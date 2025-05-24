<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function store(Request $request) {
        $request->validate([
            'category_name' => 'required|min:5|max:20',
            'category_image' => 'sometimes|mimes:jpg, jpeg, png, webp'
        ]);

        if ($request->hasFile('category_image')) {
            $image_extension = $request->category_image->extension();
            $image_name = time() . '.' . $image_extension;
            Storage::put("/public/category_images/$image_name", file_get_contents($request->category_image));
        } else {
            $image_name = 'Default_image.jpg';
        }

        Category::create([
            'category_name' => $request -> category_name,
            'category_image' => $image_name
        ]);

        return redirect()->route('admin.categories.index');
    }

    public function destroy(string $id){
        $category = Category::find($id);

        if ($category) {
            if ($category->category_image && Storage::exists("public/category_images/{$category->category_image}")) {
                Storage::delete("public/category_images/{$category->category_image}");
            }
            $category->delete();
        }
        return redirect()->route('admin.categories.index');
    }

    public function update(Request $request, $id){
        $request->validate([
            'category_name' => 'required|string|min:2|max:25',
            'category_image' => 'sometimes|mimes:jpg, jpeg, png, webp'
        ]);

        $category = Category::find($id);

        $image_name = $category->category_image;

        if ($request->hasFile('category_image')) {
            $image_extension = $request->category_image->extension();
            $image_name = time() . '.' . $image_extension;

            if (Storage::exists("/public/category_images/$category->category_image") && $category->category_image !== 'default_image.jpg') {
                Storage::delete("/public/category_images/$category->category_image");
            }

            Storage::put("/public/category_images/$image_name", file_get_contents($request->category_image));
        }

        Category::whereId($id)->update([
            'category_name' => $request -> category_name,
            'category_image' => $image_name,
    ]);

        return redirect()->route('admin.categories.index');
    }
}
