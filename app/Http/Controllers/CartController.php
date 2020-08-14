<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class CartController extends Controller
{
    public function update()
    {
		// Accede al carrito de compras y realiza el pedido
    	$cart = auth()->user()->cart;
    	$cart->status = 'Pending';
    	$cart->save(); // Actualiza Carrito

		// Muestra notificación de éxito
    	$notification = 'Tu pedido se ha registrado correctamente. Te contactaremos pronto vía mail!';
        return back()->with(compact('notification'));
    }
}
