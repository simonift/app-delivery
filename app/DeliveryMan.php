<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryMan extends Model
{
    // Un repartidor pertenece a un restaurant
    public function restaurants(){
        return $this->belongsTo(Restaurants::class);
    } 

    public function getRestaurantsNameAttribute()
    {
        if ($this->restaurants)
            return $this->restaurants->name;

        return 'General';
    }
}
