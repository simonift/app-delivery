<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{   
    // Un carrito tiene muchos pedidos
    public function details()
    {
    	return $this->hasMany(CartDetail::class); 
    }
    // Muestra el total de la compra
    public function getTotalAttribute()
    {
    	$total = 0;
    	foreach ($this->details as $detail) {
    		$total += $detail->quantity * $detail->product->price;
    	}
    	return $total;
    }
}
