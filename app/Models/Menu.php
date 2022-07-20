<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'type',
        'name',
        'description',
        'price',
        'image',
        'size',
        'barbecue',
        'vegetarian'
        
    ];

    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }


}
