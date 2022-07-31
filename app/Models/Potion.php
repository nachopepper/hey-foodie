<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potion extends Model
{
    use HasFactory;

    protected $table = 'potions';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'recipes');
    }


}
