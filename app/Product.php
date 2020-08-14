<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Un producto tiene una categoría
    public function category(){
        return $this->belongsTo(Category::class);
    } 
    
    // Un Producto tiene muchas imagenes
    public function images(){
        return $this->hasMany(ProductImage::class);
    }
    // Muestra la primera imagen del produto
    public function getFeaturedImageUrlAttribute(){
        $featuredImage = $this->images()->where('featured', true)->first();
        if(!$featuredImage)
            $featuredImage = $this->images()->first();
        
        if($featuredImage){
            return $featuredImage->url;
        }

        // Muestra imagen por defecto 
        return '/images/products/default.jpg';
    } 
    // Asigna nombre general a productos sin categoría
    public function getCategoryNameAttribute()
    {
        if ($this->category)
            return $this->category->name;

        return 'General';
    }
}
