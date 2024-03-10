<?php

namespace App\Models;

use App\Helpers\ProductCollectionHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /** ============== ATTRIBUTES ============================ */

    /**
     * Create a new Eloquent Collection instance.
     *
     * @param array<int, \Illuminate\Database\Eloquent\Model> $models
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, \Illuminate\Database\Eloquent\Model>
     */
    public function newCollection(array $models = []): Collection
    {
        return new ProductCollectionHelper($models);
    }

    /** ============== RELATIONSHIPS ============================ */

    /** ============== SCOPES ============================ */

    /** ============== FUNCTIONS ============================ */
    public function scopewithPrices(Builder $query, array $group_id = [1])
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

    public function getCartQuantityPrice()
    {
        $this->getPrice() * $this->pivot->quantity;
    }

    public function getLink()
    {
        return route('shop.details', ['id' => $this->id]);
    }
}
