<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    public function order_products(): HasMany
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }

    public function scopePaidOrders($query, $status = 'paid')
    {
        $query->where('payment_status', $status);
    }
}
