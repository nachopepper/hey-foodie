<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $table = 'recipes';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'potion_id',
        'ingredient_id',
        'quantity'
    ];

}
