<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
        // Un producto se asocia con varios Pedidos
        public function product()
        {
            return $this->belongsTo(Product::class); 
        }
}
