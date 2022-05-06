<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantModel extends Model
{
    use HasFactory;
    public $table = "restaurants";
    protected $guarded = [];
    public $timestamps = false;
}
