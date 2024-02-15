<?php

namespace App\Helpers;

use Carbon\Carbon;

class CustomHelper
{
    public static function formatPrice($price)
    {
        return number_format($price, 2, '.', '');
    }

   
}
