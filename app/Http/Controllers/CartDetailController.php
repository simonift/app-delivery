<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail; // Uso del modelo

class CartDetailController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

	// Recibe información que el usuario está realizando
    public function store(Request $request)
    {
    	$cartDetail = new CartDetail(); // Nueva instancia CartDetail
    	$cartDetail->cart_id = auth()->user()->cart->id; // Verificación de Usuario
    	$cartDetail->product_id = $request->product_id; // Envía id producto desde el request
    	$cartDetail->quantity = $request->quantity; // Recibe cantidad desde modal "
    	$cartDetail->save();

    	$notification = 'El producto se ha cargado a tu carrito de compras exitosamente!';
    	return back()->with(compact('notification'));
    }
 
    public function destroy(Request $request)
    {
    	$cartDetail = CartDetail::find($request->cart_detail_id); // Busca el carrito
		
		if ($cartDetail->cart_id == auth()->user()->cart->id) // Verificación de usuario, eliminación
    		$cartDetail->delete();

    	$notification = 'El producto se ha eliminado del carrito de compras correctamente.';
    	return back()->with(compact('notification'));
    }
}
