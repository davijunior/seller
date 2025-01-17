<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $fillable = [ 'title' ];
    public function offers(): BelongsToMany {
        return $this->belongsToMany(Offer::class, 'product_offer')->withPivot('quantity');
    }
}
