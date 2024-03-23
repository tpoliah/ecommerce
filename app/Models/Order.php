<?php

namespace App\Models;

use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    /**
     * The products that belong to the Order.
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_products')
        ->withPivot('id', 'product_id', 'user_id', 'quantity')
        ->withTimestamps()
        ;
    }

    /**
     * Get all of the order_products for the Order.
     */
    public function order_product(): HasMany
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }
}
