<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    public function index(Request $request) : Response {
        $products = Product::all();

        return Inertia::render('Product/Index', [
            "products" => $products
        ]);
    }    
}
