<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Offer;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SaleController extends Controller
{
    public function index(Request $request) : Response {
        $sales = Sale::with('offer')->get();
        $offers = Offer::all();

        return Inertia::render('Sale/Index', [
            'sales' => $sales,
            'offers'=> $offers
        ]);
    }

    public function report(Request $request): Response {
        $products = Product::with(['offers.sales'])->get();

        $report = $products->map(function ($product) { 

            $total_quantity = $product->offers->flatMap(function ($offer) {
                return $offer->sales->map(function ($sale) use ($offer) {
                    return $sale->offer_quantity * $offer->pivot->quantity;
                }); 
            })->sum();

            return [
                'product_name' => $product->title,
                'total_quantity_sold' => $total_quantity
            ];
        });
        return Inertia::render('Sale/Report', [
            'report' => $report,
        ]);
    }
}
