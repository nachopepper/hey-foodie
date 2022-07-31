<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;
    protected $table = 'sells';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'potion_id',
        'witch_id',
        'quantity',
        'created_at',
        'updated_at'
    ];

    public function potion()
    {
        return $this->belongsTo(Potion::class);
    }

    public function witch()
    {
        return $this->belongsTo(Witch::class);
    }
    				
}
