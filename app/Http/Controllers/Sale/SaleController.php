<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Services\ProductSalesReportService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SaleController extends Controller
{
    public function __construct(ProductSalesReportService $productReportService){
        $this->productReportService = $productReportService;
    }

    public function index(Request $request) : Response {
        $sales = Sale::with('offer')->get();
        $offers = Offer::all();

        return Inertia::render('Sale/Index', [
            'sales' => $sales,
            'offers'=> $offers
        ]);
    }

    public function report(Request $request): Response {
        $report = $this->productReportService->generateSalesReport();

        return Inertia::render('Sale/Report', [
            'report' => $report,
        ]);
    }
}
