<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index() {
        $types = Type::all();
        $products = Product::where('quantity', '>', 0)->get();

        return view('welcome', compact('products', 'types'));
    }

    public function filterByType($id) {
        $products = Product::where('type_id', $id)->where('quantity', '>', 0)->get();
        $types = Type::all();
        return view('welcome', compact('products', 'types'));
    }
}
