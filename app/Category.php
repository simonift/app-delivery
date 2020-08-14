<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description'];
    
    // Muestra mensajes de reglas
    public static $messages = [
        'name.required' => 'Es necesario ingresar un nombre para la categoría.',
        'name.min' => 'El nombre de la categoría debe tener al menos 3 caracteres.',
        'description.max' => 'La descripción corta solo admite hasta 250 caracteres.'
    ];

    // Define las reglas para nombre y descripción de categorías
    public static $rules = [
        'name' => 'required|min:3',
        'description' => 'max:250'
    ];
    // Una categoría tiene muchos productos
    public function products(){
        return $this->hasMany(Product::class);
    }
    // Una categoría pertenece a un restaurant
    /*public function restaurants(){
        return $this->hasMany(Restaurants::class);
    }*/

    // Muestra imagen de categoría
    public function getFeaturedImageUrlAttribute()
    {
        if ($this->image) // si tiene una imagen, devuelve la imagen asignada
            return '/images/categories/'.$this->image;
        // else devuelve la imagen del primero de sus productos
        $firstProduct = $this->products()->first();
        if ($firstProduct)
            return $firstProduct->featured_image_url;
        // en último caso se le asignará una imagen predeterminada
        return '/images/default.jpg';
    }
}
