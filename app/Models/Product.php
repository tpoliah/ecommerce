<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function scopeWithPrice(Builder $query, array $group_id = [1])
    {
        $query->where('products.id', '>', 0);
    }

    public function scopeSingleProduct($query, string $id)
    {
        $query->where('products.id', $id);
    }

    public function getImage()
    {
        return asset('storage/' . $this->image_path . $this->image_name);
    }

    public function getStockPrice()
    {
        return $this->price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getCartQuantity()
    {
        $this->getPrice() * $this->pivot->quantity;
    }

    public function getLink()
    {
        return route('shop.details', ['id' => $this->id]);
    }
}

