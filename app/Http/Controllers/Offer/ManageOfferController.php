<?php

namespace App\Http\Controllers\Offer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Http\Requests\StoreOfferRequest;

class ManageOfferController extends Controller
{
    public function store(StoreOfferRequest $request){
        $validatedData = $request->validated();

        $offer = Offer::create([
            "title" => $validatedData["title"]
        ]);

        $offer->products()->sync(
            collect($request->products)->mapWithKeys(function ($product){
                return [$product['product']['id'] => ['quantity' => $product['quantity']]];
            })->toArray()
        );

        return redirect()->route('offers.index')->with('success', 'Oferta criado com sucesso!');
    }
}
