<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    public function show(Request $request)
    {	
		$query = $request->input('query'); // Campo name query
		// Busca productos que el cliente escribe
    	$products = Product::where('name', 'like', "%$query%")->paginate(5);
		
		// Si la cantidad de productos es 1, se redirecciona la pagina products/$id
    	if ($products->count() == 1) {
    		$id = $products->first()->id;
    		return redirect("products/$id"); 
    	}

    	return view('search.show')->with(compact('products', 'query')); // Muestra en search.blade los resultados
    }

    public function data()
    {
		// Devuelve el nombre de todos los productos
    	$products = Product::pluck('name');
    	return $products;
    }
}
