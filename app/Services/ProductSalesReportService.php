<?php
namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductSalesReportService
{
    public function generateSalesReport()
    {
        return DB::table('products')
            ->join('product_offer', 'products.id', '=', 'product_offer.product_id')
            ->join('offers', 'product_offer.offer_id', '=', 'offers.id')
            ->join('sales', 'offers.id', '=', 'sales.offer_id')
            ->select('products.title as product_name', DB::raw('SUM(sales.offer_quantity * product_offer.quantity) as total_quantity_sold'))
            ->groupBy('products.title')
            ->get();
    }
}