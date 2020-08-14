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
    	$restaurants = Restaurants::all();
        return view('admin.restaurants.index')->with(compact('restaurants')); // listado

    }

    public function create()
    {
        $restaurants = Restaurants::orderBy('name')->get();
    	return view('admin.restaurants.create')->with(compact('restaurants')); // formulario de registro
    }

    public function store(Request $request)
    {
        // validar
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre para el restaurant.',
            'name.min' => 'El nombre del restaurant debe tener al menos 3 caracteres.',
            //'description.max' => 'La descripción solo admite hasta 250 caracteres.',
        ];
        $rules = [
            'name' => 'required|min:3',
            //'description' => 'required|max:250',
        ];
        $this->validate($request, $rules, $messages);

        //registrar en la bd
        $restaurants = new Restaurants();
        $restaurants->name = $request->input('name');
        $restaurants->first_comment = $request->input('first_comment');
        $restaurants->second_comment = $request->input('second_comment');
        $restaurants->slogan = $request->input('slogan');
        $restaurants->contact = $request->input('contact');
        $restaurants->phone = $request->input('phone');
        $restaurants->save(); // inserción de producto

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