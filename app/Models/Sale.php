<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Sale extends Model
{
    protected $fillable = [ 'sale_date' , 'offer_quantity', 'offer_id'];

    public function offer(): belongsTo
    {
        return $this->belongsTo(Offer::class);
    }
}
