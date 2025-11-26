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
}
