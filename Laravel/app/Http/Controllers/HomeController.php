<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('user.home');
    }

    public function searchWithProductsName(Request $request) {
        $search = $request->input('search', '');

        if ($search) {
            $products = Product::where('product_name', 'like', "%$search%")->paginate(5);
        } else {
            $products = Product::paginate(3);
        }

        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                return view('admin.products.index', compact('products'));
            }
        }
        return view('user.shops.index', compact('products'));
    }
}


