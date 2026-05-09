<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use MongoDB\Laravel\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $connection = "mongodb";
    protected $collection = "tickets";

    protected $fillable = [
        "name",
        "description",
        "price",
        "quantity",
        "event_id",
        "category_id",
        "location_id",
    ];

    /**
     * Get the event that owns the ticket.
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Get the category of the ticket.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the location of the ticket.
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
