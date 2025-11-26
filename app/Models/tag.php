<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use MongoDB\Laravel\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $connection = "mongodb";
    protected $collection = "tags";
    
    protected $fillable = [
        "name",
        "description",
    ];
}
