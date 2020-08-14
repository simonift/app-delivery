<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurants extends Model
{
    protected $fillable = ['name'];

    public static $messages = [
        'name.required' => 'Es necesario ingresar un nombre para el restaurant.',
        'name.min' => 'El nombre del restaurant debe tener al menos 3 caracteres.',
    ];
    public static $rules = [
        'name' => 'required|min:3',
    ];
    
    // Un Producto tiene muchos repartidores
    public function deliveryman(){
        return $this->hasMany(DeliveryMan::class);
    }
    // Un Restaurant tiene muchas categorias
    /*public function category(){
        return $this->hasMany(Category::class);
    }*/

}
