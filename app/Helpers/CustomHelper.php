<?php

namespace App\Helpers;

use Carbon\Carbon;

class CustomHelper
{
    public static function formatPrice($price)
    {
        return number_format($price, 2, '.', '');
    }

    public static function dateToReadable($date)
    {
        // NEW FUNCTION
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)
        ->format('F jS, Y');
    }

    public static function calculateOrderDiscount($total, $subtotal)
    {
        // Calculates the discount value
        $discount = $subtotal - $total;

        // Calculates the discount percentage
        $discountPercentage = ($discount / $subtotal) * 100;

        // Verifies if discount percentage is positive
        // $discountPercentage = $discountPercentage >= 0 ? $discountPercentage : 0;

        // Formats the discount percentage to 2 decimal places eg 1.00
        return number_format($discountPercentage, 2);
    }
}
