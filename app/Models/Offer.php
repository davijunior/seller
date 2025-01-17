<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Offer extends Model
{
    protected $fillable = [ 'title', ];
    
    public function products(): BelongsToMany {
        return $this->belongsToMany(Product::class, 'product_offer')->withPivot('quantity');
    }

    public function sales(): HasMany {
        return $this->hasMany(Sale::class);
    }
}
