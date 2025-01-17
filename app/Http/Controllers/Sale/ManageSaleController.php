<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSaleRequest;
use Carbon\Carbon;

class ManageSaleController extends Controller
{
    public function store(StoreSaleRequest $request){
        $validatedData = $request->validated();

        $sale = Sale::create([
            "sale_date" => Carbon::now(),
            "offer_id" => $validatedData['offer_id'],
            "offer_quantity" => $validatedData['quantity']
        ]);

        return redirect()->route('sales.index')->with('success', 'Venda criado com sucesso!');
    }
}
