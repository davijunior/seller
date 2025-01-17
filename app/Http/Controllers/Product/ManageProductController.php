<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;

class ManageProductController extends Controller
{
    public function store(StoreProductRequest $request){
        $validatedData = $request->validated();

        $product = Product::create([
            "title" => $validatedData["title"]
        ]);

        return redirect()->route('products.index')->with('success', 'Produto criado com sucesso!');
    }
}
