<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryMan extends Model
{
    
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
