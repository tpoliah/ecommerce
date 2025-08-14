<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\subscriptions\Subscription;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /* ====================== RELATIONSHIPS ============================== */
    /**
     * The products that belong to the User.
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'cart', 'user_id', 'product_id')
            ->withPivot('id', 'quantity')
            ->withTimestamps();
    }

    /**
     * Get all of the addresses for the User.
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    /**
     * Get all of the orders for the User.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * The activeSubscriptions that belong to the User.
     */
    public function activeSubscriptions(): BelongsToMany
    {
        return $this->belongsToMany(Subscription::class, 'subscription_orders')
            ->withPivot('id', 'group_id', 'checkout_id', 'checkout_subscription_id', 'status', 'cancel_at', 'payment_status')
            ->where(function (Builder $query) {
                $query->where('status', 'active')
                    ->orWhere(function (Builder $query) {
                        $query->where('status', 'pending_cancel')
                            ->where('cancel_at', '>', now());
                    });
            })
            ->withTimestamps()
            ->reorder('created_at', 'desc');
    }

    /* ====================== FUNCTION ============================== */
    public function getGroups(): array
    {
        return [1];
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
