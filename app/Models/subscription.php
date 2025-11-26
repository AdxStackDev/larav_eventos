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
}
