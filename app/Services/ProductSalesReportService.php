<?php
namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductSalesReportService
{
    public function generateSalesReport()
    {
        /* 
        Fazendo a consulta via SQL e num serviço, para melhor a manutenibilidade e aumentando o
        desempenho quando num fluxo de dados maior, além de diminuir o custo para o servidor, deixando
        para o banco a responsabilidade de entregar o relatório pronto 
        (o que pode gerar mais economia quando estivermos falando de muito volume de dados.)
        */
        return DB::table('products')
            ->join('product_offer', 'products.id', '=', 'product_offer.product_id')
            ->join('offers', 'product_offer.offer_id', '=', 'offers.id')
            ->join('sales', 'offers.id', '=', 'sales.offer_id')
            ->select('products.title as product_name', DB::raw('SUM(sales.offer_quantity * product_offer.quantity) as total_quantity_sold'))
            ->groupBy('products.title')
            ->get();
    }
}