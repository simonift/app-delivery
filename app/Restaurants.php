<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurants extends Model
{
    protected $fillable = ['name', 'description'];
    
    

    public static $messages = [
        'name.required' => 'Es necesario ingresar un nombre para el restaurant.',
        'name.min' => 'El nombre del restaurant debe tener al menos 3 caracteres.',
        'description.max' => 'La descripción corta solo admite hasta 250 caracteres.'
    ];
    public static $rules = [
        'name' => 'required|min:3',
        'description' => 'max:250'
    ];
    
    public function delivery_men(){
        return $this->hasMany(DeliveryMen::class);
    }

}
