<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Collection;

class ProductCollectionHelper extends Collection
{
    private $subtotal = 0;
    private $total = 0;

    public function calculateSubtotal()
    {
        $product_data = $this->all();
        foreach ($product_data as $data) {
            $this->subtotal += $data->getCartQuantityPrice();
        }
        return false;
    }

    public function calculateTotal()
    {
        return $this->total = $this->subtotal;
    }

    public function getSubtotal()
    {
        return $this->subtotal;
    }

    public function getTotal()
    {
        return $this->total;
    }
}
