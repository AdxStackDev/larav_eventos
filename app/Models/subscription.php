<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use MongoDB\Laravel\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $connection = "mongodb";
    protected $collection = "subscriptions";

    protected $fillable = [
        "user_id",
        "event_id",
        "category_id",
        "start_date",
        "expire_date",
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'expire_date' => 'datetime',
    ];

    /**
     * Get the user that owns the subscription.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the event for the subscription.
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Get the category for the subscription.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
