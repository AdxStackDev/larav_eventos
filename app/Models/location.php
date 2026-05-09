<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use MongoDB\Laravel\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'locations';

    protected $fillable = [
        'address',
        'city',
        'state',
        'country',
        'zip',
        'latitude',
        'longitude',
        'timezone',
        'event_id',
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    /**
     * Get the events at this location.
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    /**
     * Get the tickets for this location.
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
