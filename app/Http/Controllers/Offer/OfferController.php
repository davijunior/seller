<?php

namespace App\Http\Controllers\Offer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Offer;
use Inertia\Inertia;
use Inertia\Response;

class OfferController extends Controller
{
    public function index(Request $request) : Response {
        $offers = Offer::with('products')->get();
        $products = Product::all();


        return Inertia::render('Offer/Index', [
            "offers"    => $offers,
            "products_list"  => $products,
        ]);
    }
}
