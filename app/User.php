<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Cart;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address', 'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // Relación carritos asociados al usuario (Incluyendo pedido)
    public function carts(){
        return $this->hasMany(Cart::class);
    }
    
    // cart_id Metodo de acceso
    public function getCartAttribute(){
        // Selecciona el carrito con estado = Activo
        $cart = $this->carts()->where('status', 'Active')->first();
        if($cart)
            return $cart;

        //Else se crea un carrito de compras activo
        $cart = new Cart();
        $cart->status = 'Active';
        $cart->user_id = $this->id; // id del usuario
        $cart->save();

        return $cart;
    }
}
