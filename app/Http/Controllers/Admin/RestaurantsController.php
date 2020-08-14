<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Restaurants;
use File;

class RestaurantsController extends Controller
{
	public function index()
    {
    	$restaurants = Restaurants::orderBy('name')->paginate(10);
    	return view('admin.restaurants.index')->with(compact('restaurants')); // listado
    }

    public function create()
    {
    	return view('admin.restaurants.create'); // formulario de registro
    }

    public function store(Request $request)
    {
        // validar
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre para el restaurant.',
            'name.min' => 'El nombre del restaurant debe tener al menos 3 caracteres.',
            'description.max' => 'La descripción solo admite hasta 250 caracteres.',
        ];
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:250',
        ];
        $this->validate($request, Restaurants::$rules, Restaurants::$messages);

        //registrar en la bd
        Restaurants::create($request->all()); //

        return redirect('/admin/restaurants');
    }

    public function edit(Restaurants $restaurants) //Recibir id directamente
    {
        return view('admin.restaurants.edit')->with(compact('restaurants')); // form de edición
    }

    public function update(Request $request, Restaurants $restaurants)
    {
        $this->validate($request, Restaurants::$rules, Restaurants::$messages);

        $restaurants->update($request->only('name', 'description'));        

        return redirect('/admin/restaurants');
    }

    public function destroy(Restaurants $restaurants)
    {
        $restaurants->delete(); // DELETE
        return back();
    }
}
