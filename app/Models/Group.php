<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{
    use HasFactory;

    /**
     * The shipping that belong to the Group.
     */
    public function shipping(): BelongsToMany
    {
        return $this->belongsToMany(Shipping::class, 'shipping_options');
    }

    public function scopeSelectedGroup(Builder $query, $group_ids)
    {
        $query->whereIn('id', $group_ids);
    }
}
